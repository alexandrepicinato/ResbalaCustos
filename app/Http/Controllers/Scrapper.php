<?php

namespace App\Http\Controllers;
use App\Models\Buzzinesinfo;
use App\Models\Scrapplinks;
use App\Models\Productsinfo;
use App\Models\historyprices;
use Goutte\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Scrapper extends Controller
{
    //protected readonly Buzzinesinfo $buzzinesinfo;


    public function __construct(Buzzinesinfo $buzzinesinfo, Scrapplinks $scrapplinks, Productsinfo $productsinfo, historyprices  $historyprices){
        $this->Buzzinesinfo = $buzzinesinfo;
        $this -> Scrapplinks = $scrapplinks;
        $this -> Productsinfo = $productsinfo;
        $this -> historyprices = $historyprices;
    }
    public function index (){
        $productsList = $this -> Productsinfo ->get();
        return view('landpage' , [
            'products'=>$productsList
        ]);

    }
    public function reactapp (){
        return view('reactapp');

    }
    public function indexapi (){
        $productsList = $this -> Productsinfo ->get();
        return json_encode($productsList);

    }
    public function searsh (){
        $productsList = $this -> Productsinfo ->where('productname', 'like', '%' .$_GET['searsh'] . '%') -> get();
        return view('landpage' , [
            'products'=>$productsList
        ]);

    }
    public function searshapi ($p1){
        $productsList = $this -> Productsinfo ->where('productname', 'like', '%' .$p1 . '%') -> get();
        return json_encode($productsList);

    }
    public function historyPrices ($p1,$p2){
        $selectedProduct = $this -> Productsinfo -> where('id', $p2) ->get();
        //$buzzinesdata = $this -> buzzinesinfo -> where('id',  $p1)-> get();
        $productsList = $this -> historyprices ->where('bussine_id', $p1)-> where('product_id', $p2) -> get();
        return view('historyPrices' , [
            'history'=>$productsList,
            'productData' => $selectedProduct,
        ]);

    }
    public function  prices ( $productid){
        $selectedProduct = $this -> Productsinfo -> where('id', $productid) ->get();

        return view ('prices', [
            'productinfo' => [$selectedProduct [0]-> productname,$selectedProduct [0]-> productimage ],
        ]);

    }
    public function  apiprices ( $productid){
        function getPriceHTML ($publicgetSite, $filter){
            //WebBrowser Client  
            $client = new Client();
            $url = $publicgetSite;
            $request = $client->request('GET', $url);
            $valoritem = $request -> filter($filter) ;
            $custoitem = $valoritem -> text('');
            
            $custoitem=str_replace(" ", "" , $custoitem);
            $custoitem=str_replace("R$", "" , $custoitem);
            return str_replace(",", "." , $custoitem );
        }
        $selectedProduct = $this -> Productsinfo -> where('id', $productid) ->get();
        $productData = $this-> Scrapplinks -> where('product_id', $productid) ->get();
        foreach( $productData as $item){
                $dataBuzzine = $this ->Buzzinesinfo->where('id',$item['bussine_id']) ->get();
                $htmlFilter = $dataBuzzine[0]['filtrerTag'];
                $dataPrice=getPriceHTML($item['captive_link'],$htmlFilter );
                $this->historyprices->create([
                    'product_id'=>  $productid,
                    'bussine_id'=> $item['bussine_id'],
                    'currentprice'=>  $dataPrice,
                    'captive_link'=>$item['buyurl'],
                    'observation'=>'OBSERVACAO',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
        }
    }
    public function apiData($productid){
        function removeRepetidos ($array){
            $LocatedArray =[];
            $ArrayFinal =[];
            foreach( $array as $itemZ ){
                $info =$itemZ['bussine_id'] ;
                if (in_array($info,$LocatedArray) == false){
                    array_push($LocatedArray, $info);
                    array_push($ArrayFinal, $itemZ);
                }
                else{
                    
                }
            }
            return $ArrayFinal;
        }
        $dataLastPrices =[];
        $selectedProduct = $this -> Productsinfo -> where('id', $productid) ->get();
        $productData = $this-> Scrapplinks -> where('product_id', $productid) ->get();
        $arrayResult=[];
        foreach ($productData as $item){
            $data = $this-> historyprices -> where('product_id', $productid) -> where('bussine_id', $item['bussine_id'])->orderBy('created_at', 'desc')->get();
            $naorepetidos = removeRepetidos($data);
            foreach($naorepetidos as $infojson){
                $buzzinesuinfo= $this -> Buzzinesinfo -> where('id', $infojson['bussine_id']) ->get();
                array_push($dataLastPrices ,[
                    "empresa" => $buzzinesuinfo,
                    "price"  => $infojson['currentprice'],
                    "CaptiveTime" => $infojson['created_at'],
                    "captive_link"=> $infojson['captive_link'],
                ]);
            }

        }
        return json_encode([
            "product" => $selectedProduct,
            "prices"=> $dataLastPrices
        ]);
    }
    public function apihistoryPrices ($p1,$p2){
        $selectedProduct = $this -> Productsinfo -> where('id', $p2) ->get();
        //$buzzinesdata = $this -> buzzinesinfo -> where('id',  $p1)-> get();
        $productsList = $this -> historyprices ->where('bussine_id', $p1)-> where('product_id', $p2) -> get();
        function removeRepetidos ($array  ){
            $LocatedArray =[];
            $ArrayFinal =[];
            foreach( $array as $item ){
                $timestamp= $item['created_at'];
                $dateInfo = explode('-', $timestamp );
                $dateDay = $dateInfo[2];
                $day =explode(" ", $dateDay );
                $registryDay =$day[0].$dateInfo[1];
                if (in_array($registryDay,$LocatedArray) == false){
                    array_push($LocatedArray, $registryDay);
                    array_push($ArrayFinal, $item);
                }
                else{
                    
                }
            }
            return $ArrayFinal;
        }
        $filtredResults = removeRepetidos($productsList);
        return json_encode([
            'priceshistory' => $filtredResults,
        ]);


    }
}

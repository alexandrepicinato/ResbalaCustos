function tkgen(caracteries){
    var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".split("");
    var b = [];
    for (var i=0; i<caracteries; i++) {
        var j = (Math.random() * (a.length-1)).toFixed(0);
        b[i] = a[j];
    }
    return b.join("");
}
async function loaddata(buzzinesRequest, productRequest){
        var packidenti=new URLSearchParams(window.location.search).get('packid')
        var api=await fetch('/api/consultoria/products/'+productRequest+'?token='+tkgen(128)).then((resp)=> resp.json());
        return (
            api
        )

    }
function tablemader(tableData, productid){
    var dataTable = tableData['prices']
    console.log(dataTable)
    var tbody = document.createElement('tbody')
    for (var i = 0; i < (dataTable.length ); i++) {
        var row = document.createElement('tr')
        var empresa = document.createElement('td')
        var price = document.createElement('td')
        var options = document.createElement('td')
        
        
        var image = document.createElement('img')
        image.src=dataTable[i]['empresa']['0']['buzzinelogo']
        empresa.appendChild(image)
        tbody.appendChild(empresa)


        var PriceValue = document.createElement('h4')
        PriceValue.textContent = "R$"+dataTable[i]['price']
        price.appendChild(PriceValue)
        tbody.appendChild(price)
        var compreja= document.createElement('a')
        var historico= document.createElement('a')

        compreja.classList="bt btgreen"
        compreja.textContent="Compre Já "
        compreja.href=dataTable[i]['captive_link']
        options.appendChild(compreja)
        historico.classList="bt btred"
        historico.textContent="Historico"
        historico.href="/consultoria/acompanhamento/"+dataTable[i]['empresa']['0']['id']+"/"+productid+"?token="+tkgen(250)
        options.appendChild(historico)
        

        row.appendChild(empresa)
        row.appendChild(price)
        row.appendChild(options)
        tbody.appendChild(row)
    }
    document.getElementById('pricesList').appendChild(tbody)
    


}
async function expodata(){
    var pathRequest =window.location.pathname
    var requestSplit =pathRequest.split('/')
    var buzzinesRequest = requestSplit[(requestSplit.length -2)]
    var productRequest = requestSplit[(requestSplit.length -1)]
    var data = await loaddata(buzzinesRequest, productRequest,)
    tablemader(data ,productRequest)
    document.getElementById('ultimaCaptura').innerHTML="Ultima Captura Realizada em :"+data['prices'][0]['CaptiveTime']+'GMT+1'

}
expodata()
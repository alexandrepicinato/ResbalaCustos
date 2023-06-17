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
        var api=await fetch('/api/consultoria/acompanhamento/'+buzzinesRequest+'/'+productRequest+'?token='+tkgen(128)).then((resp)=> resp.json());
        var datalog =[]
        var timestamplog =[]
        for (var i = 0; i < (api['priceshistory'].length ); i++) {
            console.log(api['priceshistory'][i])
            datalog.push(api['priceshistory'][i]['currentprice'])
            timestamplog.push(api['priceshistory'][i]['created_at'])
        }
        return (
            {
                "Prices":datalog,
                "Timer":timestamplog,
                "FullRequest":api
            }
        )

    }
async function drawChart(chartData){
    var elementGraphic= document.getElementById('graphic')
    var dataApi = chartData
    const labels =dataApi['Timer']
    const datasheet ={
        labels,
        datasets:[
            {
                data: dataApi['Prices'],
                label:"Historico de Preços ",
                fill:true,

            }
        ]
    }
    const graphicConfig = {
        type:'line',
        data:datasheet,
        options:{
            responsive:true,
        }
    }
    const myChart = new Chart(elementGraphic, graphicConfig)
}
function tablemader(tableData){
    var dataTable = tableData['FullRequest']['priceshistory']
    console.log(dataTable)
    var tbody = document.createElement('tbody')
    var row = document.createElement('tr')
    var timestamp = document.createElement('td')
    var price = document.createElement('td')
    var referenceURL = document.createElement('td')
    timestamp.textContent ="Data e Hora"
    price.textContent = "Valor Capturado"
    referenceURL.textContent = "Fonte Da Captura "
    row.appendChild(timestamp)
    row.appendChild(price)
    row.appendChild(referenceURL)
    tbody.appendChild(row)
    for (var i = 0; i < (dataTable.length ); i++) {
        console.log(dataTable[i])
        var row = document.createElement('tr')
        var timestamp = document.createElement('td')
        var price = document.createElement('td')
        var referenceURL = document.createElement('td')
        timestamp.textContent = dataTable[i]['created_at']
        price.textContent = "R$"+dataTable[i]['currentprice']
        referenceURL.textContent = dataTable[i]['captive_link']
        row.appendChild(timestamp)
        row.appendChild(price)
        row.appendChild(referenceURL)
        tbody.appendChild(row)
        }
        document.getElementById('tableHistory').appendChild(tbody)
    


}
async function expodata(){
    var pathRequest =window.location.pathname
    var requestSplit =pathRequest.split('/')
    var buzzinesRequest = requestSplit[(requestSplit.length -2)]
    var productRequest = requestSplit[(requestSplit.length -1)]
    var data = await loaddata(buzzinesRequest, productRequest)
    drawChart(data)
    tablemader(data)
}
expodata()
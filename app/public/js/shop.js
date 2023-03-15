
function addToShopingChart(productId){
   
    let chart = sessionStorage.getItem('chart');
    if(!chart){
        chart = [];
        if(chart[productId] == undefined){
            chart[productId] = 1;
        }else{
            chart[productId]++;
        }
    }else{
        chart = JSON.parse(chart);
        if(chart[productId] == undefined){
            chart[productId] = 1;
        }else{
            chart[productId]++;
        }
    }

    sessionStorage.setItem('chart', JSON.stringify(chart));

    console.log(sessionStorage.getItem('chart'));
}


let shopingChartButtons = document.getElementsByClassName('shoping-chart-link');

for(let i = 0; i < shopingChartButtons.length; i++){

    shopingChartButtons[i].addEventListener('click', ()=>{
        addToShopingChart('blaaaa')
    });
}


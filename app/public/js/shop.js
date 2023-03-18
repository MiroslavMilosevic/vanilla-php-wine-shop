
function addToShopingChart(productId){
    // console.log(Math.random()*10);
    // console.log(localStorage.getItem('chart'));
    // localStorage.setItem("chart", '');
    // return;

    let chart = localStorage.getItem('chart');
    console.log(chart);


    if(!chart || chart == []){
        chart = {};
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



    console.log(chart);
    localStorage.setItem("chart", JSON.stringify(chart));

   
}


let shopingChartButtons = document.getElementsByClassName('shoping-chart-link');

for(let i = 0; i < shopingChartButtons.length; i++){

    shopingChartButtons[i].addEventListener('click', ()=>{
        let productId = shopingChartButtons[i].dataset.id; 
        addToShopingChart(productId)
    });
}


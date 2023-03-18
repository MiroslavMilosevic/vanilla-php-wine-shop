
function addToShopingChart(productId, numOfProducts){
    //  localStorage.setItem("chart", '');

    if(isNaN(numOfProducts)){
        numOfProducts = 1;
    }

    let chart = localStorage.getItem('chart');
    console.log(chart);


    if(!chart || chart == []){
        chart = {};
        if(chart[productId] == undefined){
            chart[productId] = numOfProducts;
        }else{
            chart[productId]+= numOfProducts;
        }
    }else{
        chart = JSON.parse(chart);
        if(chart[productId] == undefined){
            chart[productId] = numOfProducts;
        }else{
            chart[productId] += numOfProducts;
        }
    }
    console.log(chart);
    localStorage.setItem("chart", JSON.stringify(chart));

   
}


let addToChartButton = document.getElementById('add-to-cart-button');


addToChartButton.addEventListener('click', ()=>{
    let numOf = document.getElementById('num-of-item')
    let numOfProducts = numOf.value
    let productId = numOf.dataset.id
    // let productId = shopingChartButtons[i].dataset.id; 
        addToShopingChart(productId, Number(numOfProducts))
    });


console.log(imc);
// const buttonleft = document.querySelector('.left');
// buttonleft.addEventListener('click',  left);

// const buttonright = document.querySelector('.right');
// buttonright.addEventListener('click',  rigth);

lenImc = imc.length;
var dates = []
var IMC = []

// function left(){
//     if ((lenImc - 4) >= 0 && lenImc > 4){
//         lenImc -= 1;
//     }
// }

// function rigth(){
//     if (lenImc <= imc.length && lenImc > 4){
//         lenImc += 1;
//     }
// }
if (lenImc < 4){
    for (var i = 0; i < lenImc; i++){
        dates.push(imc[i]['imc']); 
        IMC.push(imc[i]['date_imc']);
    }
}
else{
    for (var i = (lenImc - 4); i < lenImc; i++){
        dates.push(imc[i]['imc']); 
        IMC.push(imc[i]['date_imc']);
    }
}

console.log(dates);
console.log(IMC);





 

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    
    // The data for our dataset
    data: {
        labels: IMC,
        datasets: [{
            label: 'Evolution IMC',
            borderColor: 'rgb(100, 99, 132)',
            data: dates,
            lineTension: 0  
        }]
    },
    // Configuration options go here
    
    options: {
        legend:{
            labels:{
                fontColor : '#FFF'
            }
        },
        scales:{
            yAxes:[{
                ticks: {
                    fontColor: "#FFF", 
                  },
            }],
            xAxes:[{
                ticks: {
                    fontColor: "#FFF", 
                  },
            }]
        }
        
        
    }
});
console.log(imc);


var date = [["01-01-19",65],["02-01-19",66],["03-01-19",""],["04-01-19",70],["05-01-19",64]]
var dates = []
var IMC = []
imc.forEach(element => {
    dates.push(element['imc']); 
    IMC.push(element['date_imc'])
});  
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
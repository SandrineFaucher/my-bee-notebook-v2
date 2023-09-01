const barCanvas= document.getElementById("barCanvas");

const barChart = new Chart(barCanvas, {
    type:"bar",
    data:{
        labels : ['Miel', 'Pollen', 'Gelée Royale', 'Propolis'],
        datasets :[{
            data : [200, 4, 1, 1],
            backgroundColor :['red', 'green', 'blue', 'yellow']
        }]
    },
    options:{
        scales : {
            y:{
                suggestedMax: 500,
                ticks:{
                    font:{
                        size:12
                    }
                }
            }
        }
    }
})
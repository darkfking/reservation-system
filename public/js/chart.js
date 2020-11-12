var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
        datasets: [{
            label: 'Liczba wizyt',
            backgroundColor: '#6C0472',
            borderColor: '#4A014E',
            data: [10, 10, 5, 2, 20, 30, 45, 33, 66, 26, 11, 78]
        }]
    },

    // Configuration options go here
    options: {
        legend: {
            display: false
        }
    }
});

var ctx2 = document.getElementById('myChart2').getContext('2d');
var myPieChart = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Wykonane', 'Oczekujące'],
        datasets: [{
            label: 'Liczba wizyt',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: [
                '#00adb5','#222831'
            ]
        }]
    },
    options: {}
});
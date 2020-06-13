function diagramHistogram(array, name = "Столбчатая") {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,//появление столбиков
        exportEnabled: true, //сохранение в виде картинок
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title: {
            text: name
        },
        axisY: {
            /*title: "Growth Rate (in %)",
            suffix: "%",*/
            includeZero: false, // нулевые элементы не исключаются
            title:"Значения коэффициентов"
        },
        axisX:{
            title:"Временные промежутки"
        },
        data: [{
            type: "column",
            dataPoints: array //строится по массиву значений
        }],
    });
    chart.render(); //отображение диаграммы
}

function diagramPieChart(array, name = "Круговая диаграмма") {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title:{
            text: name,
//horizontalAlign: "left"
        },
        data: [{
            type: "doughnut", //тип пончик
            startAngle: 60,
//innerRadius: 60,
            indexLabelFontSize: 17,// размер подписей
            indexLabel: "{label} - #percent%", //подписываем части диаграммы
            toolTipContent: "<b>{label}:</b> {y} (#percent%)", // подписываем период и процент при наведении
            dataPoints: array
// [
// { y: 67, label: "Inbox" },
// { y: 28, label: "Archives" },
// { y: 10, label: "Labels" },
// { y: 7, label: "Drafts"},
// { y: 15, label: "Trash"},
// { y: 6, label: "Spam"}
// ]
        }]
    });
    chart.render();//отображение диаграммы
}

function diagramLineChart(array, name = "Линейная") {

    var chart = new CanvasJS.Chart("chartContainer", {
        title:{
            text: name
        },
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2",

        axisY:{
            includeZero: false,
            title:"Значения коэффициентов"
        },
        axisX:{
            title:"Временные промежутки"
        },
        data: [{
            type: "line",
            dataPoints: array
        }],

    });
    chart.render();
}

function renderFromBackend(parameters) {
    let json = JSON.stringify({
        type: parameters.type,
        data: parameters.data,
        labels: parameters.labels,
    });

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/jpgraph', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.onload = function() {
        parameters.onload(xhr.response);
    }
    xhr.send(json);
}

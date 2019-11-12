function colorLabel(elementId) {
    var labels = document.getElementsByTagName('label');
    for(var i = 0; i < labels.length; i++) {
        if(labels[i].htmlFor == elementId) {
            labels[i].style.color = "#cbb09c";
        }
    }
}

function unColorLabel(elementId) {
    var labels = document.getElementsByTagName('label');
    for(var i = 0; i < labels.length; i++) {
        if(labels[i].htmlFor == elementId) {
            labels[i].style.color = "#a1a1a1";
        }
    }
}
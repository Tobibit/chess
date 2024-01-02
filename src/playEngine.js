const urlParams = new URLSearchParams(window.location.search);
const engineStrength = urlParams.get('engineStrength');
const orientation = urlParams.get('orientation');
const notation = urlParams.get('notation');

function pieceTheme(piece) {
    // choose theme based on user input (dropdown)
    const urlParams = new URLSearchParams(window.location.search);
    const pieceTheme = urlParams.get('pieceTheme');


    switch(pieceTheme) {
        case 'derangedHorsey': 
            return './assets/pieceThemes/derangedHorsey/' + piece + '.png'; 
        // add cases
        default: 
            return './assets/pieceThemes/default/' + piece + '.png';
    }
}

var config = {
    position: 'start',
    draggable: true,
    showNotation: notation == "true",
    dropOffBoard: 'snapback',
    pieceTheme: pieceTheme,
    orientation: orientation,
}

var board = ChessBoard('board', config);
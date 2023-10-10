function pieceTheme(piece, input) {
    // choose theme based on user input (dropdown)
    input = "derangedHorsey";
    switch(input) {
        case 'derangedHorsey': 
            return './assets/pieceThemes/derangedHorsey/' + piece + '.png'; 
        // add cases
        default: return './assets/pieceThemes/default/' + piece + '.png';
    }
}

var configCustom = {
    position: 'empty',
    draggable: true,
    showNotation: true,
    dropOffBoard: 'trash',
    pieceTheme: pieceTheme,
    sparePieces: true,
}

var configGame = {
    position: 'start',
    draggable: true,
    showNotation: true,
    dropOffBoard: 'snapback',
    pieceTheme: pieceTheme,
}

var board1 = ChessBoard('board1', configGame);
var boardCustom = ChessBoard('boardCustom', configCustom);
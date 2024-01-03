const urlParams = new URLSearchParams(window.location.search);
const engineStrength = urlParams.get('engineStrength'); // depth
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

// var game = new Chess();

var config = {
    position: 'start',
    draggable: true,
    showNotation: notation == "true",
    dropOffBoard: 'snapback',
    pieceTheme: pieceTheme,
    orientation: orientation,
    onDragStart: onDragStart,
    onDrop: onDrop,
    onDragEnd: onDragEnd,
}

var board = ChessBoard('board', config);

function onDragStart (source, piece, position, orientation) {
    return game.game_over() === false
}

function onDrop (source, target) {
    // see if the move is legal
    var move = game.move({
        from: source,
        to: target,
        promotion: 'q' // NOTE: always promote to a queen for example simplicity
    })

    // illegal move
    if (move === null) return 'snapback'

    updateStatus()
    makeEngineMove()
}

var onDragEnd = function() {
    board.position(game.fen())
}

function makeEngineMove() {
    var depth = engineStrength;
    var move = getBestMove(depth);
    game.move(move);
    board.position(game.fen());
    updateStatus();
}

function updateStatus() {
    var status = '';

    var moveColor = 'White';
    if (game.turn() === 'b') {
        moveColor = 'Black';
    }

    if (game.in_checkmate()) {
        status = 'Game over, ' + moveColor + ' is in checkmate.';
    } else if (game.in_draw()) {
        status = 'Drawn position';
    } else if (game.in_stalemate()) {
        status = 'Draw! ' + moveColor + ' is in stalemate.';
    } else {
        status = moveColor + ' to move';
        if (game.in_check()) {
            status += ', ' + moveColor + ' is in check';
        }
    }

    $('#status').html(status);
}
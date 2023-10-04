let currentlyClickedPiece = null;
const pieces = document.querySelectorAll('.boardTable td img');

pieces.forEach(piece => {
    piece.addEventListener('click', () => {
        if (currentlyClickedPiece !== null && piece === currentlyClickedPiece) {
            // If the same piece is clicked again, toggle off the 'piece-clicked' class
            piece.classList.toggle('piece-clicked');
            clearValidMoves(); // Clear valid moves for this piece
            currentlyClickedPiece = null;
            return; // Exit the function
        }

        // Remove 'piece-clicked' class from the previously clicked piece, if any
        if (currentlyClickedPiece !== null) {
            currentlyClickedPiece.classList.remove('piece-clicked');
            clearValidMoves(); // Clear valid moves for the previously clicked piece
        }

        // Add 'piece-clicked' class to the newly clicked piece
        piece.classList.add('piece-clicked');
        currentlyClickedPiece = piece;

        const pieceIdentifier = piece.getAttribute('alt');
        const pieceName = piece.getAttribute('alt').replace(/^black_|^white_/, '').replace(/\d*$/, '');
        const [pieceX, pieceY] = piecePositionFromDOM(piece);

        getValidMoves(pieceIdentifier, pieceName, pieceX, pieceY)
            .then(validMoves => {
                console.log('Valid Moves:', validMoves); // DEBUG
                validMoves.forEach(move => {
                    const cell = document.querySelector(`.boardTable td[data-x="${move[0]}"][data-y="${move[1]}"]`);
                    cell.classList.add('valid-move');
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});

function piecePositionFromDOM(piece) {
    const cell = piece.parentElement;
    const x = cell.getAttribute('data-x');
    console.log(`X: ${x}`); // DEBUG
    const y = cell.getAttribute('data-y');
    console.log(`Y: ${y}`); // DEBUG
    return [parseInt(x), parseInt(y)];
}

function getValidMoves(pieceIdentifier, pieceName, pieceX, pieceY) {
    return fetch('getValidMoves.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            pieceIdentifier,
            pieceName,
            pieceX,
            pieceY,
        }),
        
    })
        .then(response => {
            console.log('Sending JSON Data:', JSON.stringify({
                pieceIdentifier,
                pieceName,
                pieceX,
                pieceY,
            }));
            if (!response.ok) {
                throw new Error('Network response was not ok');
            } 
            return response.json();
        });
}

function clearValidMoves() {
    const cells = document.querySelectorAll('.boardTable td.valid-move');
    cells.forEach(cell => {
        cell.classList.remove('valid-move');
    });
}

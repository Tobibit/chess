let currentlyClickedPiece = null;

const pieces = document.querySelectorAll('.boardTable td img');

pieces.forEach(piece => {
    piece.addEventListener('click', () => {
        if (currentlyClickedPiece !== null && piece !== currentlyClickedPiece) {
            currentlyClickedPiece.classList.remove('piece-clicked');
        }
        
        piece.classList.toggle('piece-clicked');
        
        currentlyClickedPiece = piece;
    });
});

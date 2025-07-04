function confirmerSuppression(e) {
  e.preventDefault();
  if (confirm("Voulez vous supprimer le stagiaire")) {
    e.target.submit();
  }
}

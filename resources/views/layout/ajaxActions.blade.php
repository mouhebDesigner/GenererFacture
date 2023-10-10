<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-delete').on('click', function () {
            var url = $(this).data('url');

            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: 'Voulez-vous le supprimer!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer le!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            Swal.fire({
                                title: 'Supprimé !',
                                text: 'Votre élément a été supprimé.',
                                icon: 'success'
                            }).then((result) => {
                                location.reload(); // Rafraîchir la page après la suppression réussie
                            });
                        },
                        error: function () {
                            Swal.fire({
                                title: 'Erreur !',
                                text: 'Une erreur s\'est produite lors de la suppression de l\'élément.',
                                icon: 'error'
                            });
                        }
                    });

                }
            });
        });
    }); 
</script>

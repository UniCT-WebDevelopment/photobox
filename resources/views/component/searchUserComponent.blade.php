<div class="ui-widget">
    <input id="searchUser" class="form-control search" name="searchUser" placeholder="&#xF002; Cerca utente...">
</div>

<script>
    $(function() {
        $("#searchUser").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/searchUsers",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        searchParam: request.term
                    },
                    success: function( data ) {
                        response($.map(data, function (item) {
                            return {
                                label: item.nome + ' ' + item.cognome + ' (@' + item.nickname + ')',
                                value: item.id
                            };
                        }));
                    }
                });
            },
            minLength: 3,
            select: function(event, ui) {
                event.preventDefault();
                window.location.href = "/guestProfile?id=" + ui.item.value;
            },
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    });
</script>
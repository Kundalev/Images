document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form");

    if (form) {
        form.addEventListener("submit", function (evt) {
            evt.preventDefault();
            let input = document.getElementById('input').value
            $.post( "capcha.php", {capcha: input})
                .done(function( data ) {
                    if (data === 'Успешно'){
                        alert(data)
                    }else {
                        alert(data)
                        window.history.forward()
                        window.location.reload()
                    }
                });
        })
    }
})
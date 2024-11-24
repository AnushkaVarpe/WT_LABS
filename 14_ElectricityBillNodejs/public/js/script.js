$(document).ready(function () {
    $('#billForm').on('submit', function (event) {
        event.preventDefault(); // Prevent form submission

        const units = $('#units').val();

        if (!units || units <= 0) {
            $('#result').html('<p class="text-danger">Please enter a valid number of units.</p>');
            return;
        }

        // Make an AJAX request to the server
        $.ajax({
            url: '/calculate',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ units }),
            success: function (response) {
                $('#result').html(
                    `<p class="text-success">Total Electricity Bill: Rs. ${response.bill.toFixed(2)}</p>`
                );
            },
            error: function () {
                $('#result').html('<p class="text-danger">An error occurred. Please try again.</p>');
            },
        });
    });
});

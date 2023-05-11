<div class="dropdown text-center">
                    <select id="user-${row.id}-select" class="form-select" aria-label="Default select example">
                    <option value="admin" {{ $level == 'admin' ? 'selected' : '' }}>Admin</option>
    <option value="guru" {{ $level == 'guru' ? 'selected' : '' }}>Guru</option>
    <option value="siswa" {{ $level == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                    </select>
                            </div>
                            
                            <script>
    $('#user-${row.id}-select').on('change', function() {
        var level = $(this).val();

        $.ajax({
            type: "PUT",
            url: "/users/update/" + ${row.id},
            data: {
                level: level
            },
            success: function(response) {
                console.log('User role updated successfully');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error updating user role: ' + textStatus);
            }
        });
    });
</script>
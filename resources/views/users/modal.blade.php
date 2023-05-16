<div class="modal" id="student-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masukkan Detail Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="student_number">Nisn</label>
                        <input type="number" class="form-control" id="siswa-nisn">
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <select id="kelas-select" class="form-select" aria-label="Default select example">
                            <option selected>Pilih Kelas</option>
                            @foreach($kelas as $kelas)
                            <option value="{{$kelas->id}}">{{$kelas->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="student-modal-save">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="delete-student-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus data siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add confirmation text -->
                <p>Apakah kamu yakin untuk menghapus data siswa dengan mengubah role user ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="delete-student-modal-save">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="confirmation-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add confirmation text -->
                <p>Apakah kamu yakin untuk mengganti role user ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmation-modal-save">Save changes</button>
            </div>
        </div>
    </div>
</div>
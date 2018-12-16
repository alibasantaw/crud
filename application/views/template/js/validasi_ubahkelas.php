
        <!-- Form Update Profil -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#formedprofil').formValidation({
                    message: 'Mohon periksa kembali data anda',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        nama: {
                            message: 'Nama kelas tidak valid',
                            validators: {
                                notEmpty: {
                                    message: 'Nama kelas tidak boleh kosong'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 35,
                                    message: 'Nama kelas maksimal 35 karakter'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z/ /]+$/,
                                    message: 'Nama kelas hanya boleh terdiri dari alfabet dan spasi'
                                }
                            }
                        },
                        tahun: {
                            message: 'tahun tidak valid',
                            validators: {
                                notEmpty: {
                                    message: 'tahun tidak boleh kosong'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 5,
                                    message: 'NIM maksimal 4 karakter'
                                },
                                regexp: {
                                    regexp: /^[0-9]+$/,
                                    message: ''
                                }
                            }
                        },
                        
                    }
                });
            });
        </script>
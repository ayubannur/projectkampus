
let type = '';  

function loadPage(page, callback) {

    //pemisahan load page
    if (page === 'mahasiswa/mahasiswa.php') {
        type = 'mahasiswa';
    }else if (page === 'dosen/dosen.php'){
        type = 'dosen';
    }else if (page === 'matkul/matkul.php'){
        type = 'matkul';
    }else if (page === 'mahasiswa/chart.html'){
        type = 'chart';
    }else{
        type = type;
    }

    console.log(page);
    console.log(type);
    
    const content = document.getElementById('content');

    const xhr = new XMLHttpRequest();

    xhr.open('GET', page, true);
    
    xhr.onload = function () {
    
        if (xhr.readyState == 4 && xhr.status == 200) {
        
        //meload page
        content.innerHTML = xhr.responseText;
        //load page end

        //id id dari content uang dimuat
        let halaman = document.getElementById("pagination");
        let cari = document.getElementById("cari");
        let tambah = document.getElementById("tambahdata");
        let ubah = document.getElementById("ubahdata");
        let hapus = document.getElementById("hapusdata");
        let container = document.getElementById("container");
        let ctx = document.getElementById("myChart");
        //id end

            // pagi
            if (halaman) {
                
                pagination(halaman);
            }
            //end pagi

            //ketika pencarian di lakukan
            if (cari) {

                cariData(cari, type);
            }
            //cari end

            //ketika penambahan di lakukan
            if (tambah) {
                
                tambahData(tambah, type)
            }
            //tambah end

            //ketika mengubah
            if (ubah) {

                ubahData(container, type);
            }
            //ubah end

            //ketika menghapus
            if(hapus) {

                hapusData(container, type);
            }
            //hapus end

            //ketika membuka grafik
            if (ctx) {

                chart(ctx.getContext('2d'));   
            }
            //grafik end
            if (callback) {
                callback();
            }

        } else {

            content.innerHTML = '<h1>Error</h1><p>Halaman tidak dapat dimuat.</p>';
        }
    };

    xhr.onerror = function () {

        content.innerHTML = '<h1>Error</h1><p>Terjadi masalah saat memuat halaman.</p>';
    };

    return xhr.send();
}

function pagination(halaman) {

    console.log(halaman.id);

    if (halaman.id == "pagination") {

        halaman.addEventListener('click', function(e) {
            
            if(e.target && e.target.id === "halaman") {
                e.preventDefault();

                let page = e.target.getAttribute('value');

                loadPage(type + '/' + type + '.php?halaman='+ page);
            }
        });

    }else {

        let container = document.getElementById("container");

        halaman.addEventListener('click', function(v) {
            
            if(v.target && v.target.id === "halaman") {
                v.preventDefault();

                let page = v.target.getAttribute('value');
                
                let xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
        
                        container.innerHTML = xhr.responseText;

                        let halaman = document.getElementById("pagination-2");

                        if (halaman) {
                            
                            console.log(halaman.id);
                            pagination(halaman);
                        }
                    }
                }
        
                xhr.onerror = function () {
                    alert("Error: Tidak dapat mencari data.");
                }

                xhr.open('GET', type + '/ajax/data.php?halaman='+ page, true);

                xhr.send();
            }
        });
    }
}

function cariData(cari, type) {

    let container = document.getElementById("container");
    let form = document.getElementById('formcaridata');

    form.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            cari.click();
        }
    });

    cari.addEventListener('click', function(v) {
        v.preventDefault();

        let formData = new FormData(form);
        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                container.innerHTML = xhr.responseText;

                let halaman = document.getElementById("pagination-2");

                if (halaman) {
                    
                    console.log(halaman.id);
                    pagination(halaman);
                }
            }
        }

        xhr.onerror = function () {
            alert("Error: Tidak dapat mencari data.");
        }

        xhr.open('POST', type + '/ajax/data.php', true);

        return xhr.send(formData);
    });

}

function tambahData(tambah, type) {

    tambah.addEventListener('click', function(e) {
        e.preventDefault();

        loadPage(type +'/ajax/tmbh.php', function() {

            let submit = document.getElementById("submit");
            let kembaliAwal = document.getElementById("kembali");
            let fileInput = document.getElementById("ijazah");

            if (submit) {

                submit.addEventListener('click', function(v) {
                    v.preventDefault();
                    
                    let form = document.getElementById('formtambah');
                    let formData = new FormData(form);
                    let xhr = new XMLHttpRequest();

                    if (upload(fileInput) === true) {

                        xhr.open('POST', type + '/ajax/tmbh.php', true);
                        
                        xhr.onload = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                
                                alert("Berhasil menambahkan " + type);
                                loadPage(type + '/' + type + '.php');
                            } else {
                                
                                alert("Gagal menambahkan " + type);
                            }
                        }
                
                        xhr.onerror = function () {
                            alert("Error: Tidak dapat mengirimkan data.");
                        };
                
                        return xhr.send(formData);
                        
                    }
                });
            }

            if (kembali) {
                
                kembali(kembaliAwal, type);
            }
        });
    });

}

function ubahData(container, type) {
   
    container.addEventListener('click', function(e) {
        
        if(e.target && e.target.id === "ubahdata") {
            e.preventDefault();

            let id = e.target.getAttribute('value');

            loadPage(type + '/ajax/ubh.php?id='+id, function(){

                let submit = document.getElementById("submit");
                let kembaliAwal = document.getElementById("kembali");
                let fileLama = document.getElementById("ijazahlama");
                let fileBaru = document.getElementById("ijazahbaru");
                let fileInput = fileBaru.files[0];

                if (!fileInput) {

                    fileBaru = fileLama;
                }else {
                    
                    fileBaru = upload(fileInput);
                }

                if (submit) {

                    submit.addEventListener('click', function(v) {
                        v.preventDefault();
                        
                        let form = document.getElementById('formubah');
                        let formData = new FormData(form);
                        const xhr = new XMLHttpRequest();

                            xhr.open('POST', type + '/ajax/ubh.php', true);
                            
                            xhr.onload = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    
                                    alert("Berhasil mengubah " + type);   
                                    loadPage(type + '/' + type + '.php');             
                                } else {
                                    
                                    alert("Gagal mengubah " + type);
                                }
                            }
                            
                            xhr.onerror = function () {
                                alert("Error: Tidak dapat mengirimkan data.");
                            };
                    
                            return xhr.send(formData);
                        
                    });
                }

                if (kembali) {
                
                    kembali(kembaliAwal, type);
                }
            });
        }
    });
}

function hapusData(container, type) {

    container.addEventListener('click', function(e) {

        if(e.target && e.target.id === "hapusdata") {
                e.preventDefault();

                let id = e.target.getAttribute('value');
                let konfirmasi = confirm("apakah yakin ingin menghapus?")

                if (konfirmasi === true) {

                    loadPage(type + '/ajax/hps.php?id='+id, function(){

                    return loadPage(type + '/' + type + '.php');                   
                    });
                }else {
                    return;
                }
        }
    });
}

function kembali(kembaliAwal, type) {
    
    kembaliAwal.addEventListener('click', function(e) {
        e.preventDefault();

        return loadPage(type + '/' + type + '.php');
    });
}

function upload(fileInput) {

    let file = fileInput.files[0];
    let allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    let maxSize = 2 * 1024 * 1024; // 2MB
    
    if (!file) {

        alert('Pilih file terlebih dahulu!');
        return false;
    }

    // Cek tipe file
    if (!allowedTypes.includes(file.type)) {
        
        alert('Tipe file tidak diperbolehkan! (Hanya JPG, PNG, JPEG dan PDF)');
        return false;
    }

    // Cek ukuran file
    if (file.size > maxSize) {
        
        alert('Ukuran file melebihi 2MB!');
        return false;
    }

    return true;
}

function chart(ctx) {

    fetch('mahasiswa/ajax/chart.php')
    .then(response => response.json())
    .then(data => {
        
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: data.nama,
              datasets: [{
                label: 'Pembayaran SPP',
                data: data.spp,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });

        return myChart;
    })

    .catch(error => console.error('Error:', error));
}
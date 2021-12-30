# Muhammad Ivan Fadillah - Command Line Tools(CLI)

Cara penggunaan :

Bantuan : dengan command php index.php cli main -h

1. Gunakan command -t(spasi)format plain/json untuk menentukan format hasil konversi(spasi)nama file log
2. Gunakan -o(spasi)format plain/json(spasi)nama file log(spasi)lokasi penyimpanan user
3. Tidak memasukkan format saat command -t hasil konversi secara default berupa plain text
4. Tidak memasukkan lokasi penyimpanan maka default lokasi ada di folder <b>NAMA PROJECT</b>/log/result

Contoh penggunaan :
* php index.php cli main -h ==> untuk melihat bantuan penggunaan
* php index.php cli main -o json error.log "C:\Users\User\Documents" ==> menyimpan error.log dalam format json ke dalam folder yang ditentukan user
* php index.php cli main -t json error.log ==> menyimpan error.log dalam format json ke folder default (project/log)

Catatan :
* Lokasi folder file log yang ingin di gunakan dapat di inisialisasi sendiri oleh user pada bagian variable <b>$placelog</b>

Credit : Muhammad Ivan Fadillah

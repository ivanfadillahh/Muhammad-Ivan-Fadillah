<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cli extends CI_Controller {

	public function main($p = '-t', $cm = 'plain', $f = '', $pl = '')
	{
		// init log folder
		$placelog = './log/';
		
		// grab cm -t
		if($p == '-t')
		{
			// cek param file
			if($f == '')
			{
				echo 'Nama file tidak boleh kosong! Gunakan -h untuk bantuan.';
			}
			else{
				// read file
				$file = file($placelog.''.$f);
				if($cm == 'plain')
				{
					// not found
					if(!$file){
						echo ' File tidak ditemukan!';
					}
					// found
					else{
						// file name hasil konversi txt
						$n_file = 'reslog'.date('His').'.txt';
						// create file
						$txt = fopen($placelog.'result/'.$n_file,'w');

						// deep search ke array
						foreach($file as $line){
							// write input ke file baru
							fwrite($txt,$line);
						}
						fclose($txt);
					}
				}
				elseif($cm == 'json'){
					if(!$file){
						echo ' File tidak ditemukan!';
					}
					else{
						// file name hasil konversi json
						$n_file = 'reslog'.date('His').'.json';
						$json = fopen($placelog.'result/'.$n_file,'w');

						foreach($file as $line){
							// write ke file dengan format json
							fwrite($json,json_encode($line));
						}
						fclose($json);
					}
				}
				else{
					echo 'Kesalahan format, gunakan format plain / json. Gunakan -h untuk bantuan.';
				}
			}
		}
		// grab cm -o
		elseif($p == '-o')
		{
			// cek param file
			if($f == '' || $pl == '')
			{
				echo 'Nama file dan lokasi folder tidak boleh kosong! Gunakan -h untuk bantuan.';
			}
			else{
				// read file
				$file = file($placelog.''.$f);
				if($cm == 'plain')
				{
					// not found
					if(!$file){
						echo ' File tidak ditemukan!';
					}
					// found
					else{
						// file name hasil konversi txt
						$n_file = 'reslog'.date('His').'.txt';
						// create file ke folder pilihan user
						$txt = fopen($pl.'/'.$n_file,'w');
						// deep search ke array
						foreach($file as $line){
							// write input ke file baru
							fwrite($txt,$line);
						}
						fclose($txt);
					}
				}
				elseif($cm == 'json'){
					if(!$file){
						echo ' File tidak ditemukan!';
					}
					else{
						// file name hasil konversi json
						$n_file = 'reslog'.date('His').'.json';
						$json = fopen($pl.'/'.$n_file,'w');

						foreach($file as $line){
							// write ke file dengan format json
							fwrite($json,json_encode($line));
						}
						fclose($json);
					}
				}
				else{
					echo 'Kesalahan format, gunakan format plain / json. Gunakan -h untuk bantuan.';
				}
			}
		}
		// grab cm -h ==> for help
		elseif($p == '-h'){
			echo PHP_EOL.'Cara penggunaan : '.PHP_EOL.''.PHP_EOL.'Bantuan : dengan command php index.php cli main -h'.PHP_EOL.''.PHP_EOL.'1. Gunakan command -t<spasi>format plain/json untuk menentukan format hasil konversi<spasi>nama file log'.PHP_EOL.'2. Gunakan -o<spasi>format plain/json<spasi>nama file log<spasi>lokasi penyimpanan user'.PHP_EOL.'3. Tidak memasukkan format saat command -t hasil konversi secara default berupa plain text'.PHP_EOL.'4. Tidak memasukkan lokasi penyimpanan maka default lokasi ada di folder NAMA PROJECT/log/result'.PHP_EOL.''.PHP_EOL.'Contoh penggunaan : '.PHP_EOL.'* php index.php cli main -h ==> untuk melihat bantuan penggunaan'.PHP_EOL.'* php index.php cli main -o json error.log "C:\Users\User\Documents" ==> menyimpan error.log dalam format json ke dalam folder yang ditentukan user'.PHP_EOL.'* php index.php cli main -t json error.log ==> menyimpan error.log dalam format json ke folder default (NAMA PROJECT/log/result)'.PHP_EOL.''.PHP_EOL.'Catatan : '.PHP_EOL.''.PHP_EOL.'* Lokasi folder file log yang ingin di gunakan dapat di inisialisasi sendiri oleh user pada bagian variable $placelog'.PHP_EOL.''.PHP_EOL.'Credit : Muhammad Ivan Fadillah'.PHP_EOL.''.PHP_EOL;
		}
		else{
			echo 'Command tidak ditemukan. Gunakan -h untuk bantuan.';
		}
	}
}

var MyApp = angular.module("MyApp",[]);

MyApp.controller("MyCtrl",function($scope,$http){
	// deklarasi variabel awal
	$scope.aksi = "tambah";
	$scope.memberForm = {};
    
	// fungsi untuk tambah data
	$scope.tambahData = function(){
		$http.post(
			'data/simpan-data.php',
			{
				data: $scope.memberForm
			}
		).success(function(data){
			alert(data);
			$scope.aksi = "tambah";
			$scope.memberForm = '';
			$scope.tampilData();
		}).error(function(){
			alert("Gagal menyimpan data!");
		});
	};
	
	// fungsi untuk ubah data
	$scope.ubahData = function(){
		$http.post(
			'data/ubah-data.php',
			{
				id: $scope.idYgAkanDiUbah,
				data: $scope.memberForm
			}
		).success(function(data){
			alert(data);
			$scope.memberForm = '';
			$scope.tampilData();
			$scope.aksi = "tambah";
		}).error(function(){
			alert("Gagal mengubah data!");
		});
	};
	
	// fungsi untuk set value dari $scope.memberForm agar bisa di edit
	$scope.ubah = function(item,memberForm){
		$scope.idYgAkanDiUbah = item.id;
		$scope.memberForm = item;
		$scope.aksi = "ubah";
	};
	
	// fungsi untuk simpan data
	// bisa melakukan proses tambah atau ubah data sesuai dengan value dari $scope.aksi
	$scope.simpanData = function(){
		switch($scope.aksi){
			case "tambah":
				$scope.tambahData();
				$scope.aksi = "tambah";
			break;
			
			case "ubah":
				$scope.ubahData();
			break;
		}
	};
	
	// fungsi untuk menampilkan data
	$scope.tampilData = function(){
		$http.get(
			'data/tampil-data.php'
		).success(function(data){
			$scope.dataPelanggan = data;
		});
	};
	
	// fungsi untuk hapus data sesuai dengan id
	$scope.hapusData = function(id){
		if (confirm('Yakin ingin menghapus data ini?')) {
			$http.post(
				'data/hapus-data.php',
				{
					id:id
				}
			).success(function(){
				$scope.tampilData();
			}).error(function(){
				alert("Gagal menghapus data!");
			});
		};
	};
	
});

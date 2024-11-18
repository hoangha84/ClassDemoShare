//4.8. Mang a gom n dong n cot
#include <iostream>
#include <stdlib.h>
#include <time.h>
using namespace std;
#define max 100

void nhap(int a[][max], int &n){
	cout<<"Nhap n:";cin>>n;
	for(int i = 0; i<n; i++)
		for(int j=0; j<n; j++)
			cin>>a[i][j];
	return;
}

void nhapNN(int a[][max], int &n){
	cout<<"Nhap n:";cin>>n;
	for(int i = 0; i<n; i++)
		for(int j=0; j<n; j++)
			a[i][j] = rand() % 10;
	return;
}

void xuat(int a[][max], int n){
	for(int i = 0; i<n; i++){
		cout<<endl;
		for(int j=0; j<n; j++)
			cout<<a[i][j]<<" ";
	}
		
	return;	
}

//4.8.a Tong duong bien
void tongBien (int a[][max], int n){
	cout<<"\ntongBien: ";
	int tong = 0;
	for(int i=0; i<n; i++){
		for(int j=0; j<n; j++){
			if(i==0 || j==0 || i==n-1 || j==n-1){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}				
		}
	}
	cout<<"\nTong bien: "<<tong;
	return;
}
//4.8.b Tong duong cheo chinh
void tongCheoChinh(int a[][max], int n){
	cout<<"\nCheo chinh: ";
	int tong = 0;
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)
			if(i==j){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}	
	cout<<"\nTong cheo chinh: "<<tong;
	return;
}

//4.8.c Tong duong cheo phu
void tongCheoPhu(int a[][max], int n){
	cout<<"\nCheo phu: ";
	int tong = 0;
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)
			if(i+j==n-1){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}	
	cout<<"\nTong cheo phu: "<<tong;
	return;
}

//4.8.d Tong tam giac tren (tren duong cheo chinh)
void tongTGTren(int a[][max], int n){
	cout<<"\nTam giac tren: ";
	int tong = 0;
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)
			if(j>i){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}	
	cout<<"\nTong tam giac tren: "<<tong;
	return;
}

//Tong tam giac duoi duong cheo phu
void tongTGDuoiCheoPhu(int a[][max], int n){
	cout<<"\nTam giac duoi cheo phu: ";
	int tong = 0;
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)
			if(i+j>n-1){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}	
	cout<<"\nTong tam giac duoi duong cheo phu: "<<tong;
	return;
}

int laNT(int a){
	if(a<2) return 0;
	for(int i=2; i<a; i++)
		if(a%i==0) return 0;
	return 1;
}

//Hinh vuong so nguyen to, cho biet kich thuoc
void hinhvuongSNT(int a[][100], int n){
	cout<<"\nHinh vuong so nguyen to: ";
	int tong = 0;
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)
			if(1){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}	
	cout<<"\nHinh vuong so nguyen to: "<<tong;
	return;
}

int main(){
	int n;
	
	srand(time(NULL));
	
	int a[max][max];
	nhapNN(a,n);
	xuat(a,n);
//	tongBien(a,n);
//	tongCheoChinh(a,n);
//	tongCheoPhu(a,n);
//	tongTGTren(a,n);
//	tongTGDuoiCheoPhu(a,n);
	
	return 0;
}

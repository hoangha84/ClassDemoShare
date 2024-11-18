//4.8 cho mang n*n
#include <iostream>
#include <stdlib.h>
#include <time.h>
using namespace std;
#define m 100

void nhapNN(int a[][m], int &n){
	cin>>n;
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)
			a[i][j] = rand() % 10;
	return;
}

void xuat(int a[][m], int n){
	for(int i=0; i<n; i++){	
		for(int j=0; j<n; j++)	
			cout<<a[i][j]<<" ";
		cout<<endl;
	}
	return;
}

//4.8.a. Tong duong bien
void tongBien(int a[][m], int n){	
	int tong = 0;
	cout<<"\nGia tri: ";
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)	
			if(i==0 || i==n-1 || j==0 || j==n-1){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}
				
	cout<<"\nTong duong bien: "<<tong;
	return;
}

//4.8.b. Tong duong cheo chinh
void tongCheoChinh(int a[][m], int n){	
	int tong = 0;
	cout<<"\nGia tri: ";
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)	
			if(i==j){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}
				
	cout<<"\nTong duong cheo chinh: "<<tong;
	return;
}

//4.8.c. Tong duong cheo phu
void tongCheoPhu(int a[][m], int n){	
	int tong = 0;
	cout<<"\nGia tri: ";
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)	
			if(i+j==n-1){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}
				
	cout<<"\nTong duong cheo phu: "<<tong;
	return;
}

//4.8.d. Tong tam giac tren (tren duong cheo chinh)
void tongTGT(int a[][m], int n){	
	int tong = 0;
	cout<<"\nGia tri: ";
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
void tongTGD(int a[][m], int n){	
	int tong = 0;
	cout<<"\nGia tri: ";
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)	
			if(i+j>n-1){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}
				
	cout<<"\nTong tam giac duoi duong cheo phu: "<<tong;
	return;
}

//Tong 1/4 hinh vuong (goc tren ben phai)
void tongHVNho(int a[][m], int n){	
	int tong = 0;
	cout<<"\nGia tri: ";
	for(int i=0; i<n; i++)
		for(int j=0; j<n; j++)	
			if(i<(n-1)/2 && j>(n-1)/2){
				cout<<a[i][j]<<" ";
				tong+=a[i][j];
			}
				
	cout<<"\nTong hinh vuong 1/4 goc tren ben phai: "<<tong;
	return;
}

int main(){
	srand(time(NULL));
	int a[m][m];	
	int n;	
	nhapNN(a,n);
	xuat(a,n);
	
//	tongBien(a,n);
//	tongCheoChinh(a,n);
//	tongCheoPhu(a,n);
//	tongTGT(a,n);
//	tongTGD(a,n);
	tongHVNho(a,n);
		
	return 0;
}

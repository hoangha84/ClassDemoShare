//4.1.e. Sap xep so nguyen to ve cuoi mang
#include <iostream>
#include <cstdlib> // Needed for rand() and srand()
#include <ctime> 
using namespace std;

void nhap (int a[], int &n){
	cout<<"Nhap so phan tu n:";
	cin>>n;
	for(int i=0; i<n; i++)
		cin>>a[i];
	return;
}

void nhapNN (int a[], int &n){
	cout<<"Nhap so phan tu n:";
	cin>>n;
	for(int i=0; i<n; i++)
		a[i] = rand() % 20;
	return;
}

void xuat(int a[], int n){
	cout<<endl;
	for(int i=0; i<n; i++)
		cout<<a[i]<<",";
	return;
}

int laNT(int a){
	if(a<2)
		return 0;
	for(int i=2; i<a; i++)
		if(a%i==0)
			return 0;
	return 1;			
}
void doimang(int a[], int vt, int n){
	int tam = a[vt];
	for(int i=vt; i<n; i++)
		a[i]=a[i+1];
	a[n-1] = tam;
	return;
}

void sort(int a[], int n){
	int dem=0;	
	for(int i=0; i<n; i++){
		while(laNT(a[i])){
			doimang(a, i, n);
			dem++;
			if(dem>n)
				return;
		}
	}
	return;
}

int main(){
	srand(time(NULL));
	
	int a[1000], n;
	nhapNN(a,n);	
	xuat(a,n);
	
	cout<<"\nDoi mang:";
	sort(a, n);
	xuat(a,n);
	return 0;
}

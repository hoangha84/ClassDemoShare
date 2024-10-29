//4.1.e. Sap xep so nguyen to ve cuoi mang
#include <iostream>
using namespace std;

void nhap(int a[], int &n){
	cin>>n;
	for(int i=0; i<n; i++)
		cin>>a[i];
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
void swap(int &a, int &b){
	int tam = a;
	a=b;
	b=tam;
	return;
}

void sortNT(int a[], int n){
	int j = n-1;
	for(int i=0; i<j; i++){
		while(laNT(a[i])){
			swap(a[i],a[j]);
			j--;
			if(j==i)
				return;
//			xuat(a,n);
		}			
	}
	return;
}
void sortTangDanSTN(int a[], int n){
	for(int i=0; i<n-1; i++){
		for(int j=i+1; j<n; j++){
			if(laNT(a[j])==0){
				if(a[j]<a[i]){
//						cout<<"swap"<<a[j]<<"-"<<a[i];
					swap(a[j],a[i]);
				}						
			}
		}
	}
	return;
}

void sortGiamDanSNT(int a[], int n){
	for(int i=0; i<n-1; i++){
		if(laNT(a[i])){
			for(int j=i+1; j<n; j++){
				if(a[j]>a[i])
					swap(a[j],a[i]);
			}
		}
	}
	return;
}

int main(){
	int a[1000], n;
	nhap(a,n);
	sortNT(a,n);
//	cout<<"\nEnd:";
//	xuat(a,n);
//	cout<<endl;
	sortTangDanSTN(a,n);
	sortGiamDanSNT(a,n);
	xuat(a,n);
	
	return 0;	
}

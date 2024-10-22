//4.1.c Dem so nguyen to cua mang
#include <iostream>
using namespace std;

void nhapmang(int a[], int &n){
	cout<<"Nhap so phan tu n:";
	cin>>n;
	cout<<"Nhap "<<n<<" phan tu cua mang:";
	for(int i = 0; i<n; i++){
		cin>>a[i];
	}
	return;
}

int laNT(int a){
	if(a<2)
		return 0;
	for(int i=2; i<a; i++){
		if(a%i==0)
			return 0;
	}
	return 1;
}

int main(){
	int a[100000], n;
	nhapmang(a,n);
	int dem = 0;
	
	for(int i=0; i<n; i++){
		//neu a[i] la so nguyen to -> dem++;
		if(laNT(a[i]))
			dem++;
	}	
	
	cout<<"Co "<<dem<<" so nguyen to trong mang.";
	return 0;
}

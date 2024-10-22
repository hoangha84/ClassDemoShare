//4.1.b Tinh trung binh cong cac so trong mang
#include <iostream>
using namespace std;
#define m 100000

void nhapmang(int a[], int &n){
	cout<<"Nhap so phan tu n:";
	cin>>n;
	cout<<"Nhap "<<n<<" phan tu cua mang:";
	for(int i = 0; i<n; i++){
		cin>>a[i];
	}
	return;
}

int main(){
	int a[m], n;
	nhapmang(a, n);
	int tong = 0;
	
	for(int i=0; i<n; i++){
		tong+=a[i];
	}
	
//	cout<<"Trung binh cong: "<<(float)tong/n;
	cout<<"Trung binh cong: "<<tong*1.0/n;
	
	return 0;	
}


//4.1.a
#include <iostream>
using namespace std;

//int main(){
//	int a[10000];
//	int n;
//	cout<<"Nhap so phan tu n: ";
//	cin>>n;
//	cout<<"\nNhap "<<n<<" gia tri cua mang a:";
//	for(int i=0; i<n; i++){
//		cin>>a[i];
//	}
//	cout<<"\nMang vua nhap la: ";
//	for(int i=0; i<n; i++){
//		cout<<a[i]<<" ";
//	}
//	
//	return 0;
//}

void nhap(int arr[], int &num){
	cout<<"Nhap so phan tu cua mang:"; cin>>num;
	cout<<"Nhap "<<num<<" gia tri cua mang: ";
	for(int i=0; i<num; i++){
		cin>>arr[i];
	}
}
void xuat(int a[], int n){
	cout<<"\nMang vua nhap la: ";
	for(int i=0; i<n; i++){
		cout<<a[i]<<" ";
	}
}

int tongchuso(int n){
	int tong = 0;
	while (n>0){
		tong+=(n%10);
		n/=10;
	}
	return tong;
}

int main(){
	int a[10000]; int n;
	nhap(a, n);
	int tong = 0;
	for(int i=0; i<n; i++){
		tong+=tongchuso(a[i]);
//		cout<<tongchuso(a[i])<<" ";
	}
	cout<<tong;
	
	//xuat(a, n);
	return 0;
}

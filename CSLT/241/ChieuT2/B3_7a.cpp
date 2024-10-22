//3.7.	Cho s? nguyên d??ng n. 
//a.	S1=1 + 2 + 3 +...+ n

#include <iostream>
using namespace std;

int TinhTong(int n){
	if(n==1)
		return 1;
	return TinhTong(n-1)+n;
}

int main(){
	int n;
	cin>>n;
//	int s = 0;
//	for(int i=1; i<=n; i++){
//		s+=i;
//	}
	
	cout<<"S("<<n<<")="<<TinhTong(n);
	
	return 0;
}

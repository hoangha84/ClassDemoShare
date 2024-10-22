//So dao nguoc
#include <iostream>
using namespace std;

int main(){
	int n;
	cin>>n;
	int sodao = 0;
	cout<<"So dao nguoc cua "<<n<<" la: ";
	while(n>0){
		sodao = (sodao * 10) + (n%10);
		n/=10;
	}
	
	cout<<sodao;
	
	return 0;
}

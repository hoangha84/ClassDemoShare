//So dao nguoc
#include <iostream>
using namespace std;

int main(){
	int n, sodao, tam;
	cin>>n;
	sodao=0;
	tam=n;
	while (tam>0){
		sodao = sodao*10 + (tam%10);
		tam/=10;
	}
	
	cout<<"So dao nguoc cua "<<n<<" la so: "<<sodao;
	return 0;
}

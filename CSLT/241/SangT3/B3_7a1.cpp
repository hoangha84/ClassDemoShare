//3.7.a1 Tinh tich S = 1 * 2 * 3 *....* n
#include <iostream>
using namespace std;

int main(){
	int n; cin>>n;
	int s = 1;
	for(int i = 1; i<=n; i++)
		s*=i;
	
	cout<<"S("<<n<<")="<<s;
	
	return 0;
}

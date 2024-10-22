//3.7.b Tinh tong S = 1^2 + 2^2 + 3^2 +....+ n^2
#include <iostream>
using namespace std;

int main(){
	int n; cin>>n;
	int s = 0;
	for(int i = 1; i<=n; i++)
		s+=(i*i);
	
	cout<<"S("<<n<<")="<<s;
	
	return 0;
}

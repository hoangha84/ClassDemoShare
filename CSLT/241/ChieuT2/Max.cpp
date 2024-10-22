#include <iostream>
using namespace std;

int main(){
	int a, b, c, max;
	cout<<"a:";
	cin>>a;
	max = a;
	cout<<"b:";
	cin>>b;
	max = (b>max) ? b : max;
	cout<<"c:";
	cin>>c;
	max = (c>max) ? c : max;
	cout<<"Max="<<max;
	return 0;
}

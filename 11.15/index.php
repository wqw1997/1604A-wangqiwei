<?php

class Solution {
public:
vector<int> FindNumbersWithSum(vector<int> array,int sum) {
    //vector<int> temp;
vector<int> result;
int len = array.size();
int i = 0,j = 0;
for(i = 0,j = len - 1;i < len && j > i;)
{
if(array[i] + array[j] == sum)
{
result.push_back(array[i]);
result.push_back(array[j]);
return result;
}
else if(array[i] + array[j] > sum)
                j--;
            else
                i++;
}
return result;
}
};
?>
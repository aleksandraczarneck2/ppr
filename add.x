struct input
{
    int a;
    int b;
};

program ADD_P
{
    version ADD_V
    {
        int add(input) = 1;
    } = 1;
} = 0x21000000;
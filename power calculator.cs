using System;

namespace power_calc
{
    class Program
    {
        static void Main(string[] args)
        {
            int final = 0;
            Console.WriteLine("input base");
            int Base = Convert.ToInt32(Console.ReadLine());
            Console.WriteLine("input power");
            int power = Convert.ToInt32(Console.ReadLine());
            for (int i = 0; i <= power; i++)
            {
               final = Base * power;
            }
            Console.WriteLine(Base + " in the power of " + power + " equals " + final);
        }
    }
}

# Advanced PHP Exercises

## OOPS Concepts

### Q. Define Object-Oriented Programming (OOP) and its four main principles: Encapsulation, Inheritance, Polymorphism, and Abstraction.

#### **Object-Oriented Programming (OOP)**

- Object-Oriented Programming (OOP) is a programming paradigm that organizes software design around objects, which are instances of classes.
- Objects encapsulate data (attributes) and behavior (methods) and interact with each other to build complex systems.
- OOP enhances code reusability, scalability, and maintainability.

#### **Four Main Principles of OOP**

1. **Encapsulation**

   - Encapsulation is the bundling of data (variables) and methods (functions) that operate on the data into a single unit, called a class.
   - It restricts direct access to some components, enforcing data protection and reducing unintended interference.
   - Achieved through access modifiers like `private`, `protected`, and `public` in languages like PHP, Java, and C++.
   - **Example:**

   ```php
   class User {
       private $password;

       public function setPassword($pwd) {
           $this->password = password_hash($pwd, PASSWORD_BCRYPT);
       }

       public function getPassword() {
           return "Access Denied";
       }
   }

   $user = new User();
   $user->setPassword("secret123");
   echo $user->getPassword(); // Output: Access Denied
   ```

2. **Inheritance**

   - Inheritance allows a class (child) to inherit attributes and methods from another class (parent).
   - It promotes code reuse and establishes a relationship between different classes.
   - **Example:**

     ```php
     class Animal {
         public function makeSound() {
             return "Some generic sound";
         }
     }

     class Dog extends Animal {
         public function makeSound() {
             return "Bark!";
         }
     }

     $dog = new Dog();
     echo $dog->makeSound(); // Output: Bark!
     ```

3. **Polymorphism**

   - Polymorphism allows objects to be treated as instances of their parent class, even when they refer to child class objects.
   - It enables method overriding and method overloading, allowing different behaviors for the same method name.
   - **Example:**

     ```php
     class Shape {
         public function area() {
             return "Calculating area...";
         }
     }

     class Circle extends Shape {
         private $radius;

         public function __construct($radius) {
             $this->radius = $radius;
         }

         public function area() {
             return pi() * $this->radius * $this->radius;
         }
     }

     $shape = new Circle(5);
     echo $shape->area(); // Output: 78.54
     ```

4. **Abstraction**

   - Abstraction hides complex implementation details and only exposes essential functionalities.
   - Achieved using abstract classes and interfaces.
   - **Example:**

     ```php
     abstract class Vehicle {
         abstract public function start();
     }

     class Car extends Vehicle {
         public function start() {
             return "Car engine started!";
         }
     }

     $car = new Car();
     echo $car->start(); // Output: Car engine started!
     ```

### Practical Exercise: Create a simple class in PHP that demonstrates encapsulation by using private and public properties and methods.

```php
class BankAccount
{
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $initialBalance)
    {
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "<p>Deposited: $amount.</p>"; 
            echo "New Balance: $this->balance</p>";
        } else {
            echo "<p>Invalid deposit amount.</p>";
        }
    }

    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "<p>Withdrawn: $amount. Remaining Balance: $this->balance</p>";
        } else {
            echo "<p>Invalid withdrawal amount or insufficient balance.</p>";
        }
    }

    public function getBalance()
    {
        return $this->balance;
    }
}

// Example usage
$account = new BankAccount("123456789", 1000);
echo "<p> New Account created wih Initial Balance: " . $account->getBalance() . "</p>";
$account->deposit(500);
$account->withdraw(200);
echo "<p>Final Balance: " . $account->getBalance() . "</p>";
```

## Class

### Explain the structure of a class in PHP, including properties and methods.  

#### **Structure of a Class in PHP**  

A **class** in PHP serves as a blueprint for creating objects. It defines **properties** (variables) and **methods** (functions) that describe an object's behavior.  

---

#### **Basic Structure of a PHP Class**
```php
class ClassName {
    // Properties (attributes)
    public $property1;
    private $property2;

    // Constructor (optional)
    public function __construct($value) {
        $this->property1 = $value;
    }

    // Methods (functions)
    public function method1() {
        return "This is a public method.";
    }

    private function method2() {
        return "This is a private method.";
    }
}

// Creating an Object
$object = new ClassName("Hello");
echo $object->method1(); // Output: This is a public method.
```

---

#### **Components of a PHP Class**

1. **Class Declaration**  
   - Defined using the `class` keyword, followed by a class name (PascalCase naming convention is preferred).  

2. **Properties (Attributes)**  
   - Variables that hold the object's data.  
   - Can have different access modifiers:
     - `public` → Accessible from anywhere.  
     - `private` → Accessible only within the class.  
     - `protected` → Accessible within the class and subclasses.  

3. **Methods (Functions)**  
   - Define the behavior of the object.  
   - Can also have `public`, `private`, and `protected` access modifiers.  

4. **Constructor (`__construct`)**  
   - A special method that is automatically called when an object is created.  
   - Used for initializing properties.  

5. **Destructor (`__destruct`)**  
   - A special method that is called when an object is destroyed or script execution ends.  
   - Useful for cleanup tasks like closing database connections.  
   ```php
   public function __destruct() {
       echo "Object is being destroyed!";
   }
   ```

6. **Encapsulation with Getters & Setters**  
   - Used to control access to private properties.
   ```php
   class User {
       private $name;

       public function setName($name) {
           $this->name = $name;
       }

       public function getName() {
           return $this->name;
       }
   }

   $user = new User();
   $user->setName("Nirav");
   echo $user->getName(); // Output: Nirav
   ```

---

#### **Example: A Real-World Class (Car)**
```php
class Car {
    private $brand;
    private $speed;

    public function __construct($brand, $speed) {
        $this->brand = $brand;
        $this->speed = $speed;
    }

    public function getCarInfo() {
        return "The {$this->brand} is moving at {$this->speed} km/h.";
    }
}

// Creating an object
$myCar = new Car("Toyota", 120);
echo $myCar->getCarInfo(); // Output: The Toyota is moving at 120 km/h.
```

---

#### **Conclusion**
- A class acts as a **blueprint** for objects.
- **Properties** store object data, and **methods** define behaviors.
- **Encapsulation** using private properties and getter/setter methods enhances security.
- **Constructors** help initialize values at object creation.

This structured approach makes PHP code more **scalable, reusable, and maintainable**.  

### Practical Exercise: Write a PHP script to create a class representing a "Car" with properties like make, model, and year, and a method to display the car details.  

```php
class Car
    {
        private $make;
        private $model;
        private $year;

        public function __construct($make, $model, $year)
        {
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
        }

        public function displayDetails()
        {
            echo "<p>Car Details: $this->year $this->make $this->model</p>";
        }
    }

    // Example usage
    $car1 = new Car("Toyota", "Corolla", 2018);
    $car1->displayDetails();
```

## Object

### Q. What is an object in OOP? Discuss how objects are instantiated from classes in PHP.  

#### What is an Object in OOP?  
- An **object** in Object-Oriented Programming (OOP) is an instance of a class.  
- It represents a real-world entity with **properties (attributes)** and **methods (behaviors)** defined by the class.  
- Objects encapsulate data and functionality, making the code more modular and reusable.  

#### Instantiating Objects from Classes in PHP  
- In PHP, an object is created using the `new` keyword, which instantiates a class. Here’s how it works:  

#### **Example: Creating and Using an Object in PHP**  

```php
// Defining a class
class Car {
    public $brand;
    public $model;

    // Constructor to initialize properties
    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    // Method to display car details
    public function display() {
        echo "Car: $this->brand $this->model";
    }
}

// Creating an object (instantiating a class)
$car1 = new Car("Toyota", "Camry");

// Accessing object properties and methods
echo $car1->display(); // Output: Car: Toyota Camry
```

#### **Key Points about Object Instantiation in PHP**  

1. **Using `new` Keyword** – Objects are created using `new ClassName()`.  
2. **Constructors (`__construct`)** – Automatically initializes object properties when instantiated.  
3. **Accessing Properties and Methods** – Use `$object->property` to access attributes and `$object->method()` to call functions.  
4. **Multiple Objects** – A class can create multiple independent objects with different data.  

### Practical Exercise: Instantiate multiple objects of the "Car" class and demonstrate how to access their properties and methods.  

```php
class Car
    {
        private $make;
        private $model;
        private $year;
        public function __construct($make, $model, $year)
        {
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
        }

        public function displayDetails()
        {
            echo "<p>Car Details: $this->year $this->make $this->model</p>";
        }
    }

    // Example usage
    $car1 = new Car("Toyota", "Corolla", 2018);
    $car1->displayDetails();
    $car2 = new Car("Honda", "Civic", 2019);
    $car2->displayDetails();
    $car3 = new Car("Suzuki", "Swift", 2020);
    $car3->displayDetails();
    $car4 = new Car("Hyundai", "Accent", 2021);
    $car4->displayDetails();
```

## Extends

### Q. Explain the concept of inheritance in OOP and how it is implemented in PHP. 

#### **Concept of Inheritance in OOP**  
- Inheritance is a fundamental concept in Object-Oriented Programming (OOP) that allows one class (child/subclass) to inherit properties and methods from another class (parent/superclass).  
- It promotes **code reusability**, **hierarchical relationships**, and **extensibility** in software design.  
- With inheritance, a child class can:
    - Use methods and properties of the parent class.  
    - Override or extend the functionality of inherited methods.  
    - Introduce new methods specific to itself.  

#### **Implementing Inheritance in PHP**  
- In PHP, inheritance is implemented using the `extends` keyword.  
- The child class inherits all public and protected properties and methods of the parent class.  

#### **Example: Inheritance in PHP**  
```php
// Parent class
class Animal {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        echo "$this->name makes a sound.";
    }
}

// Child class inheriting from Animal
class Dog extends Animal {
    public function speak() {
        echo "$this->name barks.";
    }
}

// Creating objects
$animal = new Animal("Generic Animal");
$animal->speak(); // Output: Generic Animal makes a sound.

$dog = new Dog("Buddy");
$dog->speak(); // Output: Buddy barks.
```

#### **Key Points About Inheritance in PHP**  
1. **`extends` Keyword** – Used to define a subclass that inherits from a parent class.  
2. **Method Overriding** – A child class can redefine (override) a method from the parent class.  
3. **Protected Members** – Properties/methods marked as `protected` can be accessed within child classes but not outside.  
4. **Parent Constructor Call** – The child class can call the parent’s constructor using `parent::__construct()`.  

#### **Example: Using `parent::__construct()`**  
```php
class Vehicle {
    protected $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function getBrand() {
        return $this->brand;
    }
}

class Car extends Vehicle {
    private $model;

    public function __construct($brand, $model) {
        parent::__construct($brand); // Call parent constructor
        $this->model = $model;
    }

    public function getCarDetails() {
        return "Car: " . $this->getBrand() . " " . $this->model;
    }
}

// Creating an object
$car = new Car("Toyota", "Camry");
echo $car->getCarDetails(); // Output: Car: Toyota Camry
```

####  **Benefits of Inheritance**  
- **Code Reusability** – Avoids redundant code by reusing parent class logic.  
- **Better Organization** – Creates hierarchical relationships among classes.  
- **Scalability** – Easily extend and maintain functionality.  
- **Encapsulation** – Protects data by allowing controlled access through inherited methods.  

### Practical Exercise: Create a "Vehicle" class and extend it with a "Car" class. Include properties and methods inboth classes, demonstrating inherited behavior.  

```php
class Vehicle
    {
        protected $make;
        protected $model;
        protected $year;
        public function __construct($make, $model, $year)
        {
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
        }
        public function displayDetails()
        {
            echo "<p>Vehicle Details: $this->year $this->make $this->model</p>";
        }
    }

    class Car extends Vehicle
    {
        private $color;
        public function __construct($make, $model, $year, $color)
        {
            parent::__construct($make, $model, $year);
            $this->color = $color;
        }
        public function displayDetails()
        {
            echo "<p>Car Details: $this->year $this->make $this->model $this->color</p>";
        }
    }

    // Example usage
    $car1 = new Car("Toyota", "Corolla", 2018, "Red");
    $car1->displayDetails();        // Car Details: 2018 Toyota Corolla Red
    $car2 = new Car("Honda", "Civic", 2019, "Blue");
    $car2->displayDetails();        // Car Details: 2019 Honda Civic Blue
    $vehicle1 = new Vehicle("Toyota", "Corolla", 2018);
    $vehicle1->displayDetails();    // Vehicle Details: 2018 Toyota Corolla
    $vehicle2 = new Vehicle("Honda", "Civic", 2019);
    $vehicle2->displayDetails();    // Vehicle Details: 2019 Honda Civic
```

## Overloading

### Q. Discuss method overloading and how it is implemented in PHP.  

#### **Method Overloading in PHP**  

- **Method Overloading** is a feature in Object-Oriented Programming (OOP) that allows multiple methods with the same name but different parameters.  
- While languages like Java and C++ support true method overloading, PHP does not support traditional method overloading directly.  
- However, PHP provides **magic methods (`__call()` and `__callStatic()`)** to achieve dynamic method handling, allowing objects to handle method calls that are not explicitly defined.

#### **Implementing Method Overloading using `__call()`**  
- PHP uses the `__call()` method to handle **undefined or overloaded instance methods**.  
- Example: Method Overloading with `__call()`

```php
class Calculator {
    // Magic method to handle method overloading
    public function __call($name, $arguments) {
        if ($name == "add") {
            switch (count($arguments)) {
                case 2:
                    return $arguments[0] + $arguments[1]; // Add two numbers
                case 3:
                    return $arguments[0] + $arguments[1] + $arguments[2]; // Add three numbers
                default:
                    return "Invalid number of arguments!";
            }
        }
    }
}

// Creating an object
$calc = new Calculator();
echo $calc->add(10, 20) . PHP_EOL;      // Output: 30
echo $calc->add(5, 15, 25) . PHP_EOL;   // Output: 45
echo $calc->add(5) . PHP_EOL;           // Output: Invalid number of arguments!
```

#### **Overloading Static Methods using `__callStatic()`**  
- If a method is called **statically** but does not exist, `__callStatic()` is triggered.  
- Example: Static Method Overloading**

```php
class MathOperations {
    public static function __callStatic($name, $arguments) {
        if ($name == "multiply") {
            return array_product($arguments); // Multiply all numbers
        }
    }
}

// Calling overloaded static method
echo MathOperations::multiply(2, 3) . PHP_EOL;         // Output: 6
echo MathOperations::multiply(2, 3, 4) . PHP_EOL;      // Output: 24
```

#### **Key Points About Method Overloading in PHP**

1. **PHP does not support traditional method overloading** (same method name with different parameters).  
2. **Magic methods `__call()` and `__callStatic()`** handle undefined method calls dynamically.  
3. **`__call()` is used for instance methods**, while **`__callStatic()` is used for static methods**.  
4. **Allows dynamic method handling**, useful for APIs, frameworks, and flexible function parameters.  

#### **Advantages of Method Overloading**
- Provides **flexibility** by allowing methods with different numbers of arguments.  
- Helps create **dynamic and scalable** class methods.  
- Reduces repetitive code by handling similar logic within a single function.  

### Practical Exercise: Create a class that demonstrates method overloading by defining multiple methods with the same name but different parameters.

```php
class AddNumbers
    {
        public function __call($methodname, $args)
        {
            if ($methodname == 'add') {
                switch (count($args)) {
                    case 2:
                        return $args[0] + $args[1];
                    case 3:
                        return $args[0] + $args[1] + $args[2];
                    case 4:
                        return $args[0] + $args[1] + $args[2] + $args[3];
                    default:
                        return "Invalid number of arguments";
                }
            } else {
                echo "<p>Method does not exist</p>";
            }
        }
    }

    // Examples
    $newadd = new AddNumbers();
    echo "<p>" . $newadd->add(2) . "</p>";                  // Invalid number of arguments
    echo "<p>" . $newadd->add(25, 35) . "</p>";             // 60
    echo "<p>" . $newadd->add(10, 20, 30) . "</p>";         // 60
    echo "<p>" . $newadd->add(20, 40, 60, 80) . "</p>";     // 200
    echo "<p>" . $newadd->add(15, 25, 35, 45, 55) . "</p>"; // Invalid number of arguments
```

## Abstraction Interface  

### Q. Explain the concept of abstraction and the use of interfaces in PHP. 

#### **Abstraction in PHP** 
- **Abstraction** is an Object-Oriented Programming (OOP) concept that **hides implementation details** and only exposes relevant functionality.  
- It allows developers to define a blueprint for classes without specifying how the methods are implemented.  
- In PHP, abstraction is achieved using abstract classes and interfaces.  
- An **abstract class**:
    - Cannot be instantiated.
    - Can have both **fully defined** and **abstract (undefined) methods**.
    - Must be **extended** by a subclass, which provides implementations for abstract methods.
- Example: Abstract Class in PHP

```php
abstract class Animal {
    // Abstract method (must be implemented in child classes)
    abstract public function makeSound();

    // Concrete method (already defined)
    public function sleep() {
        return "Sleeping...";
    }
}

class Dog extends Animal {
    public function makeSound() {
        return "Dog barks";
    }
}

$dog = new Dog();
echo $dog->makeSound(); // Output: Dog barks
echo $dog->sleep();     // Output: Sleeping...
```

#### **Key Benefits of Abstract Classes**:
- Enforces a structure for subclasses.
- Allows partial implementation (abstract + concrete methods).
- Useful for defining **base classes** with shared functionality.

#### **Interface in PHP**
- An **interface**:
    - Defines a contract for classes **without** providing any method implementation.
    - Only contains **abstract methods** (all methods must be public).
    - A class **must implement all methods** defined in the interface.
- Example: Interface in PHP

```php
interface Vehicle {
    public function start();
    public function stop();
}
class Car implements Vehicle {
    public function start() {
        return "Car is starting...";
    }
    public function stop() {
        return "Car is stopping...";
    }
}

$myCar = new Car();
echo $myCar->start(); // Output: Car is starting...
echo $myCar->stop();  // Output: Car is stopping...
```

#### **Key Benefits of Interfaces**:
- Supports **multiple inheritance** (a class can implement multiple interfaces).
- Ensures **strict implementation** of required methods.
- Promotes **loose coupling** and **scalability**.

#### Difference Between Abstract Classes and Interfaces**
| Feature | Abstract Class | Interface |
|---------|---------------|-----------|
| **Can have method implementations?** | ✅ Yes | ❌ No (all methods must be abstract) |
| **Can have properties?** | ✅ Yes | ❌ No (only method definitions) |
| **Supports multiple inheritance?** | ❌ No | ✅ Yes (a class can implement multiple interfaces) |
| **Use case** | Partial implementation (shared functionality) | Enforces method structure (multiple behaviors) |

#### Using Both Abstract Classes and Interfaces Together**

- You can **combine abstract classes and interfaces** for flexibility.
- Example: Combining Abstract Classes and Interfaces

```php
interface Engine {
    public function start();
}
abstract class Vehicle {
    abstract public function speed();

    public function fuel() {
        return "Using fuel...";
    }
}
class Car extends Vehicle implements Engine {
    public function start() {
        return "Engine started!";
    }
    public function speed() {
        return "Car is moving at 80 km/h";
    }
}

$car = new Car();
echo $car->start(); // Output: Engine started!
echo $car->speed(); // Output: Car is moving at 80 km/h
echo $car->fuel();  // Output: Using fuel...
```

- **Abstract class** provides a **base structure** (common functionality).
- **Interface** ensures **specific behaviors** (engine behavior for all vehicles).
- **Abstraction** hides implementation details while providing essential functionality.
- **Abstract classes** are useful when you need **partially implemented base classes**.
- **Interfaces** define **strict contracts** that enforce method implementation.
- **Combining both** provides flexibility and maintainability in large applications.

---

### Practical Exercise: Define an interface named `VehicleInterface` with methods like `start()`, `stop()`, and implement this interface in multiple classes. 

```php
interface Vehicle
{
    public function start();
    public function stop();
}
class Car implements Vehicle
{
    public $brand;
    public $model;
    public function __construct($brand, $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }
    public function start()
    {
        return "Car is starting...";
    }
    public function stop()
    {
        return "Car is stopping...";
    }
}
class HeavyVehicle implements Vehicle
{
    public $brand;
    public $model;
    public $loadcapacity;
    public function __construct($brand, $model, $loadcapacity)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->loadcapacity = $loadcapacity;
    }
    public function start()
    {
        return "Heavy vehicle starting ...";
    }
    public function stop()
    {
        return "Heavy vehicle stopping ...";
    }
}
// Usage example
$myCar = new Car("Maruti", "Swift");
echo "<p>" . $myCar->start() . "</p>"; // Output: Car is starting...
echo "<p>" . $myCar->stop() . "</p>";  // Output: Car is stopping...
$myTruck = new HeavyVehicle("Tata", "4025", "40000");
echo "<p>" . $myTruck->start() . "</p>"; // Output: Heavy vehicle starting ...
echo "<p>" . $myTruck->stop() . "</p>"; // Output: Heavy vehicle stopping ...
```

---

## Constructor

### Q. What is a constructor in PHP? Discuss its purpose and how it is used. 

- In PHP, a **constructor** is a special method within a class that is automatically called when a new object of that class is created.  
- The constructor's primary purpose is to **initialize the object's state** when it is created.  
- This means setting values for the object's properties or executing any setup tasks that are required for the object to function properly.  
- A constructor is defined using the `__construct()` method in a class.  
- The `__construct` method is called automatically when a new instance of the class is created using the `new` keyword.

```php
class MyClass {
    public $name;

    // Constructor
    public function __construct($name) {
        $this->name = $name; // Initialize the property
        echo "Object created with name: " . $this->name . "\n";
    }
}

// Creating an instance of the class
$obj = new MyClass("Nirav");
```

- Constructors can accept parameters, which allow you to pass values when creating the object.  
- These values can then be used to initialize the object's properties.

```php
class Car {
    public $make;
    public $model;

    // Constructor with parameters
    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }
}

// Creating an object with parameters
$myCar = new Car("Toyota", "Corolla");
echo $myCar->make; // Output: Toyota
echo $myCar->model; // Output: Corolla
```

- If a constructor doesn’t require parameters, it can be defined without any arguments.  
- This is useful for setting default values for the object.

```php
class User {
    public $username;
    public $email;

    // Constructor with default values
    public function __construct() {
        $this->username = "default_user";
        $this->email = "default@example.com";
    }
}

$user = new User();
echo $user->username; // Output: default_user
```

- PHP does not support **constructor overloading**, meaning you cannot have multiple constructors with different parameter types.  
- If you need to handle different scenarios, you can use optional parameters or `if` conditions inside the constructor.

```php
class Rectangle {
    public $width;
    public $height;

    // Constructor with optional parameters
    public function __construct($width = 5, $height = 10) {
        $this->width = $width;
        $this->height = $height;
    }
}

$rect1 = new Rectangle();       // Uses default values
$rect2 = new Rectangle(8, 12);  // Custom values
```

### Practical Exercise: Create a class with a constructor that initializes properties when an object is created.  

- <a href="./practical_exe_files/filelist/practical_exe_07.php">Practical Exercise 07</a>

## Destructor  

### Q. Explain the role of a destructor in PHP and when it is called. 

- In PHP, a **destructor** is a special method within a class that is automatically called when an object is destroyed, meaning when it is no longer in use or when the script ends.  
- The purpose of the destructor is to **clean up** resources, perform final tasks, or release memory that was allocated during the lifetime of the object.  
- **Name**: The destructor method in PHP is always named `__destruct()`.
- **Automatic Invocation**: It is automatically invoked when the object goes out of scope or when the script ends.
- **No Parameters**: The destructor method does not accept any parameters.
- **Memory Management**: It helps in cleaning up resources such as closing database connections, releasing file handles, or freeing any other resources that need explicit cleanup.

#### When is a Destructor Called?

- The destructor is called when an object is no longer referenced or when it goes out of scope.  
- This can happen in various ways:
   - **Unsetting the object** using `unset()`.
   - **When the object goes out of scope**, typically at the end of a function or method.
   - **At the end of the script execution**, PHP will automatically clean up and call the destructor if necessary.
- PHP uses a garbage collector to manage memory.  
- When objects are no longer in use (i.e., there are no more references to them), the garbage collector may destroy them, triggering the destructor.  
- However, it’s important to note that the exact timing of garbage collection is not guaranteed.
- Example of a Destructor:

```php
class FileHandler {
    private $file;

    public function __construct($filename) {
        $this->file = fopen($filename, "w"); // Open a file
        echo "File opened successfully.\n";
    }

    public function write($data) {
        fwrite($this->file, $data); // Write data to the file
    }

    // Destructor to close the file
    public function __destruct() {
        fclose($this->file); // Close the file
        echo "File closed successfully.\n";
    }
}

$fileHandler = new FileHandler("example.txt");
$fileHandler->write("Hello, world!");
// Destructor will be called automatically when the object goes out of scope (end of script)
```

In the example above:
- The **constructor** opens a file for writing.
- The **destructor** automatically closes the file when the object is no longer needed, freeing up the file handle.

#### Destructor Use Cases:
1. **Closing Open Files**: If your program opens files, you want to close them when the object is destroyed, to ensure that resources are released properly.
2. **Database Connections**: When your object interacts with a database, the destructor can be used to close the database connection once the object is destroyed.
3. **Releasing Other Resources**: If the object uses any other external resources (e.g., network connections, caching mechanisms), the destructor can ensure those resources are properly cleaned up.

#### Example with Multiple Objects:
- If you have multiple objects, each with its own destructor, PHP will call the destructors for each object as they are destroyed (typically when the script finishes or objects go out of scope).

```php
class DatabaseConnection {
    public function __construct() {
        echo "Database connection established.\n";
    }

    public function __destruct() {
        echo "Database connection closed.\n";
    }
}

class Cache {
    public function __construct() {
        echo "Cache initialized.\n";
    }

    public function __destruct() {
        echo "Cache cleared.\n";
    }
}

$db = new DatabaseConnection();
$cache = new Cache();

// Destructor for both objects will be automatically called when the script ends or objects are unset
```

- **No Return Value**: Destructors cannot return values; they are purely for cleanup.
- **Destructors and Object References**: If there are circular references between objects (e.g., one object references another and vice versa), PHP’s garbage collector will handle this, and destructors will still be called when the objects are no longer needed.
- **Timing**: The exact timing of the destructor is not predictable because PHP uses a reference-counting garbage collector. It is typically called at the end of the script or when an object is no longer referenced.
- If you want to manually destroy an object and invoke its destructor early, you can use the `unset()` function:

```php
$obj = new FileHandler("test.txt");
unset($obj); // Destructor is called here to close the file
```

### Practical Exercise: Write a class that implements a destructor to perform cleanup tasks when an object is destroyed.  

- <a href="./practical_exe_files/filelist/practical_exe_08.php">Practical Exercise 08</a>

## Magic Methods

### Q. Define magic methods in PHP. Discuss commonly used magic methods like `__get()`, `__set()`, and `__construct()`.

### Magic Methods in PHP

- **Magic methods** in PHP are special methods that start with double underscores (`__`) and are automatically called when certain actions are performed on objects.  
- These methods allow you to customize the behavior of your classes for common operations like object initialization, property access, method calls, and more.
- Magic methods are part of the **Object-Oriented Programming (OOP)** functionality in PHP, and they help you interact with objects in a dynamic way without needing to explicitly define every single method for each operation.
- Here’s a look at some commonly used magic methods, including `__construct()`, `__get()`, and `__set()`:

#### 1. `__construct()` — The Constructor

- **Purpose**: The `__construct()` method is the constructor of a class, automatically invoked when a new instance of the class is created.  
- It is used to initialize the object and set up initial values for its properties.
- **Syntax**:
  ```php
  public function __construct([parameters]) { }
  ```

- **Usage**:
  - Initializes object properties when an object is created.
  - Can accept parameters to initialize the object with specific values.
- Example:
  ```php
  class User {
      public $name;
      
      public function __construct($name) {
          $this->name = $name;
          echo "User {$this->name} created.\n";
      }
  }

  $user = new User("John");  // Calls __construct() and outputs "User John created."
  ```

#### 2. `__get()` — Getting Properties Dynamically

- **Purpose**: The `__get()` method is called automatically when attempting to access a non-existing or inaccessible property of an object.  
- This allows you to define how property values are retrieved, even if the property doesn’t exist or isn’t publicly accessible.

- **Syntax**:
  ```php
  public function __get($name) { }
  ```

- **Usage**:
  - Used for **dynamic property access** (i.e., when a property is not directly accessible).
  - Can be used to return values for "virtual" or "computed" properties.

- Example:
  ```php
  class Person {
      private $data = [
          'firstName' => 'John',
          'lastName' => 'Doe'
      ];

      public function __get($name) {
          if (isset($this->data[$name])) {
              return $this->data[$name];
          }
          return "Property not found!";
      }
  }

  $person = new Person();
  echo $person->firstName;  // Outputs: John
  echo $person->lastName;   // Outputs: Doe
  echo $person->age;        // Outputs: Property not found!
  ```

#### 3. `__set()` — Setting Properties Dynamically

- **Purpose**: The `__set()` method is called automatically when attempting to set a non-existing or inaccessible property of an object.  
- Like `__get()`, it allows you to define custom behavior when setting values for properties that do not directly exist.
- **Syntax**:
  ```php
  public function __set($name, $value) { }
  ```

- **Usage**:
  - Used for **dynamic property assignment**.
  - Useful for situations where you want to control the assignment of properties (e.g., validation, transformation).
- Example:
  ```php
  class Product {
      private $data = [];

      public function __set($name, $value) {
          $this->data[$name] = strtoupper($value);  // Convert value to uppercase
      }

      public function __get($name) {
          return $this->data[$name] ?? null;
      }
  }

  $product = new Product();
  $product->name = "laptop";  // Calls __set() and stores "LAPTOP"
  echo $product->name;        // Outputs: LAPTOP
  ```

#### 4. `__call()` — Handling Undefined Method Calls

- **Purpose**: The `__call()` method is invoked when an attempt is made to call a method that does not exist or is not accessible in the object.  
- It allows you to handle such calls dynamically.
- **Syntax**:
  ```php
  public function __call($name, $arguments) { }
  ```

- **Usage**:
  - Useful for handling dynamic method names or routing method calls to different logic.
- Example:
  ```php
  class Calculator {
      public function __call($name, $arguments) {
          if ($name == 'add') {
              return array_sum($arguments);
          }
          return "Method not found.";
      }
  }

  $calc = new Calculator();
  echo $calc->add(5, 3, 7);  // Outputs: 15
  ```

#### 5. `__toString()` — Converting Object to String

- **Purpose**: The `__toString()` method is invoked when an object is treated as a string (e.g., when echoing an object).  
- It allows you to define a custom string representation for an object.

- **Syntax**:
  ```php
  public function __toString() { }
  ```

- **Usage**:
  - Enables the object to be printed as a string by defining how it should be represented.
  
- Example:
  ```php
  class Person {
      public $name;
      public $age;

      public function __toString() {
          return "Name: {$this->name}, Age: {$this->age}";
      }
  }

  $person = new Person();
  $person->name = "Alice";
  $person->age = 30;
  echo $person;  // Outputs: Name: Alice, Age: 30
  ```

#### 6. `__isset()` — Checking if a Property is Set

- **Purpose**: The `__isset()` method is called when `isset()` is called on a non-existing or inaccessible property of an object.  
- It allows you to define custom logic to check if a property is set.

- **Syntax**:
  ```php
  public function __isset($name) { }
  ```

- **Usage**:
  - Can be used for custom logic when checking if a property exists.

- Example:
  ```php
  class User {
      private $data = ['username' => 'admin'];

      public function __isset($name) {
          return isset($this->data[$name]);
      }
  }

  $user = new User();
  var_dump(isset($user->username));  // Outputs: bool(true)
  var_dump(isset($user->password));  // Outputs: bool(false)
  ```

- Magic methods provide a powerful way to interact with objects dynamically. They allow you to:
    - Implement custom behaviors for properties and methods that might not exist at compile time.
    - Enforce validation, logging, or transformations on dynamic data.
    - Create flexible, reusable code that can handle unknown or changing inputs.

### Practical Exercise: Create a class that uses magic methods to handle property access and modification dynamically.  

- <a href="./practical_exe_files/filelist/practical_exe_09.php">Practical Exercise 09</a>

## Scope Resolution

### Q. Explain the scope resolution operator (`::`) and its use in PHP.  

- The **scope resolution operator** (`::`), is used in PHP to access **static**, **constant**, and **class-level** properties and methods. 
- It allows you to reference class members (properties and methods) without needing to instantiate an object of the class.

#### 1. **Accessing Static Methods and Properties**
- Static properties and methods belong to the class itself rather than to any specific instance of the class.  
- The `::` operator is used to access these static members.
- **Static Method Example**:
  ```php
  class MyClass {
      public static function sayHello() {
          echo "Hello, World!";
      }
  }

  // Accessing a static method using the scope resolution operator
  MyClass::sayHello();  // Output: Hello, World!
  ```

- **Static Property Example**:
  ```php
  class MyClass {
      public static $greeting = "Hello";

      public static function greet() {
          echo self::$greeting . ", World!";
      }
  }

  // Accessing a static property using the scope resolution operator
  echo MyClass::$greeting;  // Output: Hello
  ```

#### 2. **Accessing Constants**
- You can use the `::` operator to access **class constants**.  
- Constants are defined using the `const` keyword and are not meant to be changed once set.
- **Class Constant Example**:
  ```php
  class MyClass {
      const GREETING = "Hello, World!";
  }

  // Accessing a class constant
  echo MyClass::GREETING;  // Output: Hello, World!
  ```

- Class constants are typically used for values that should remain constant throughout the lifetime of the class (e.g., configuration values, error codes, etc.).

#### 3. **Accessing Parent Class Methods and Properties**
- The `::` operator is also used in inheritance to call methods or access properties of a **parent class**.  
- You can use `parent::` to access the parent class's members.  
- **Parent Class Access Example**:
  ```php
  class ParentClass {
      protected static $name = "Parent Class";

      public static function display() {
          echo "This is the " . self::$name . ".";
      }
  }

  class ChildClass extends ParentClass {
      public static function show() {
          echo "This is the " . parent::$name . ".";
      }
  }

  // Accessing parent class static property using the scope resolution operator
  ChildClass::show();  // Output: This is the Parent Class.
  ```

#### 4. **Accessing Methods in Interfaces and Traits**
- The `::` operator is used to refer to methods from interfaces or traits.  
- You can call static methods from interfaces directly, as well as call methods from traits when used in a class.
- **Calling Interface Method**:
  ```php
  interface MyInterface {
      public static function sayHello();
  }

  class MyClass implements MyInterface {
      public static function sayHello() {
          echo "Hello from Interface!";
      }
  }

  MyClass::sayHello();  // Output: Hello from Interface!
  ```

- **Calling Trait Method**:
  ```php
  trait MyTrait {
      public static function sayHello() {
          echo "Hello from Trait!";
      }
  }

  class MyClass {
      use MyTrait;
  }

  MyClass::sayHello();  // Output: Hello from Trait!
  ```

#### 5. **Accessing the Current Class with `self::`**
- You can use `self::` within a class to refer to **static properties and methods** of that class, including those that are inherited from parent classes.
- **Example with `self::`**:
  ```php
  class MyClass {
      public static $name = "MyClass";

      public static function display() {
          echo "Class Name: " . self::$name;
      }
  }

  MyClass::display();  // Output: Class Name: MyClass
  ```

### Practical Exercise: Create a class with static properties and methods, and demonstrate their access using the scope resolution operator.  

- <a href="./practical_exe_files/filelist/practical_exe_10.php">Practical Exercise 10</a>

## Traits

### Q. Define traits in PHP and their purpose in code reuse.  

### Traits in PHP: Purpose and Use in Code Reuse

- **Traits** in PHP are a mechanism for code reuse in single inheritance languages, allowing developers to share methods across multiple classes without the need for inheritance.  
- They help avoid the problem of code duplication by allowing you to define reusable sets of methods that can be included in one or more classes.  
- While PHP supports **single inheritance** (a class can only inherit from one parent class), **traits** provide a way to reuse functionality across multiple classes without creating a complex inheritance hierarchy.

#### Key Characteristics of Traits:
- **Code Reuse**: Traits allow for the reuse of methods across different classes.
- **No Inheritance**: Unlike classes, traits cannot be instantiated. They are used to **extend** functionality, not to create objects.
- **Combining Multiple Traits**: A single class can use multiple traits, allowing it to combine various pieces of functionality.
- **No Constructor or Destructor**: Traits cannot have constructors or destructors, as they are meant to provide reusable functionality, not to manage object lifecycle.

#### Defining a Trait
- A trait is defined using the `trait` keyword followed by the trait's name.  
- Inside the trait, you can define methods, but you cannot define properties or constants (although properties can be declared inside a class using `use` in combination with traits).

```php
trait Logger {
    public function log($message) {
        echo "Log: $message\n";
    }
}

class MyClass {
    use Logger; // Including the Logger trait

    public function performAction() {
        echo "Performing action...\n";
        $this->log("Action performed");  // Accessing method from the trait
    }
}

$obj = new MyClass();
$obj->performAction();  // Output: Performing action... Log: Action performed
```

In the example above:
- The `Logger` trait defines a `log()` method.
- The `MyClass` class uses the `Logger` trait, allowing it to call `log()` without defining it in the class.

#### Using Multiple Traits
- A class can use multiple traits by separating them with commas in the `use` statement.  
- This allows a class to combine functionality from several traits.

```php
trait A {
    public function methodA() {
        echo "Method from trait A\n";
    }
}

trait B {
    public function methodB() {
        echo "Method from trait B\n";
    }
}

class MyClass {
    use A, B;  // Using both traits

    public function callMethods() {
        $this->methodA();
        $this->methodB();
    }
}

$obj = new MyClass();
$obj->callMethods();
// Output:
// Method from trait A
// Method from trait B
```

- `MyClass` combines methods from both trait `A` and trait `B` by using them together.
- The methods `methodA()` and `methodB()` can be called on instances of `MyClass`.

#### Purpose of Traits: Code Reuse

1. **Avoiding Code Duplication**  
    - One of the main purposes of traits is to avoid **code duplication**.  
    - Rather than repeating the same methods in several classes, you can define them in a trait and simply include that trait in all relevant classes.

        ```php
        trait DatabaseConnection {
            public function connect() {
                echo "Connecting to the database...\n";
            }
        }

        class User {
            use DatabaseConnection;
            public function getUserData() {
                echo "Fetching user data...\n";
            }
        }

        class Admin {
            use DatabaseConnection;
            public function getAdminData() {
                echo "Fetching admin data...\n";
            }
        }

        $user = new User();
        $user->connect();  // Reused from trait
        $admin = new Admin();
        $admin->connect();  // Reused from trait
        ```
    - In this example, both `User` and `Admin` classes have a `connect()` method without having to duplicate the method code.

2. **Combining Functionality**
    - Traits allow you to **combine** functionality across classes that may not be related by inheritance.  
    - You can add specific methods to different classes that need them, even if the classes do not share a common parent.  
    - For example, a class can implement logging functionality using a `Logger` trait, and another unrelated class can also implement caching functionality using a `Cache` trait, all without forcing them to inherit from a common class.

3. **Separation of Concerns**  
    - Traits allow you to separate distinct pieces of functionality into isolated units. For instance:
    - One trait might handle **logging**, another might handle **validation**, and another could deal with **database access**.  
    - You can then include these traits in the classes that need that specific functionality.

        ```php
        trait Validation {
            public function validate($data) {
                echo "Validating data...\n";
            }
        }

        trait Caching {
            public function cache($data) {
                echo "Caching data...\n";
            }
        }

        class User {
            use Validation, Caching;  // User class needs both validation and caching functionality

            public function saveUser($data) {
                $this->validate($data);
                $this->cache($data);
                echo "User data saved\n";
            }
        }

        $user = new User();
        $user->saveUser("Some user data");
        // Output:
        // Validating data...
        // Caching data...
        // User data saved
        ```

4. **Avoiding Multiple Inheritance Issues**  
    - PHP does not support multiple inheritance (a class cannot extend more than one class).  
    - However, traits allow you to mimic **multiple inheritance** in a controlled manner by letting a class use multiple traits.  
    - This avoids the complexity and issues that arise with multiple inheritance while still allowing for flexible code reuse.

        ```php
        trait Validation {
            public function validate() {
                echo "Validation\n";
            }
        }

        trait Logging {
            public function log() {
                echo "Logging\n";
            }
        }

        class User {
            use Validation, Logging;  // Multiple traits used in a single class
        }

        $user = new User();
        $user->validate();  // Output: Validation
        $user->log();       // Output: Logging
        ```

#### Important Points About Traits:
1. **No Instantiation**: Traits cannot be instantiated. They are included in classes using the `use` keyword.
2. **Conflict Resolution**: If two traits define a method with the same name, a conflict arises. PHP provides a way to resolve conflicts by using `insteadof` and `as` operators.
   
   - **Conflict Resolution Example**:
     ```php
     trait TraitA {
         public function greet() {
             echo "Hello from Trait A\n";
         }
     }

     trait TraitB {
         public function greet() {
             echo "Hello from Trait B\n";
         }
     }

     class MyClass {
         use TraitA, TraitB {
             TraitB::greet insteadof TraitA;  // Resolving conflict
             TraitA::greet as greetFromA;     // Aliasing method
         }
     }

     $obj = new MyClass();
     $obj->greet();       // Output: Hello from Trait B
     $obj->greetFromA();  // Output: Hello from Trait A
     ```

3. **No Constructors**: Traits cannot have constructors or destructors, so they can't be used to manage the initialization or cleanup of objects. However, methods inside the trait can be used for such purposes.

### Practical Exercise: Create two traits and use them in a class to demonstrate how to include multiple behaviors.  

- <a href="./practical_exe_files/filelist/practical_exe_11.php">Practical Exercise 11</a>

## Visibility

### Q. Discuss the visibility of properties and methods in PHP (public, private, protected). 

In PHP, **visibility** determines how properties and methods of a class can be accessed. There are three levels of visibility:

#### **1. Public**
- The property or method is accessible from anywhere, including outside the class.
- This is the default visibility if none is specified.
- Example:

```php
class Example {
    public $name = "John";

    public function greet() {
        return "Hello, " . $this->name;
    }
}

$obj = new Example();
echo $obj->name;  // Accessible
echo $obj->greet();  // Accessible
```

#### **2. Private**
- The property or method is accessible **only within the class** where it is declared.
- It cannot be accessed from outside the class, including child classes.
- Example:
```php
class Example {
    private $secret = "Hidden";

    private function getSecret() {
        return $this->secret;
    }

    public function revealSecret() {
        return $this->getSecret();
    }
}

$obj = new Example();
// echo $obj->secret;  // ❌ Fatal error
// echo $obj->getSecret();  // ❌ Fatal error
echo $obj->revealSecret();  // ✅ Allowed via a public method
```

#### **3. Protected**
- The property or method is accessible **within the class** and **by derived (child) classes**, but **not from outside the class**.
- Example:
```php
class ParentClass {
    protected $message = "Protected Property";

    protected function showMessage() {
        return $this->message;
    }
}

class ChildClass extends ParentClass {
    public function getMessage() {
        return $this->showMessage(); // Allowed in subclass
    }
}

$obj = new ChildClass();
// echo $obj->message;  // ❌ Fatal error
// echo $obj->showMessage();  // ❌ Fatal error
echo $obj->getMessage();  // ✅ Allowed via public method in subclass
```

#### **Summary Table**

| Visibility  | Same Class | Derived Class | Outside Class |
|------------|-----------|--------------|--------------|
| **Public**   | ✅ Yes  | ✅ Yes  | ✅ Yes  |
| **Private**  | ✅ Yes  | ❌ No  | ❌ No  |
| **Protected** | ✅ Yes  | ✅ Yes  | ❌ No  |

---

#### **When to Use Which Visibility?**
- **Public** → When you need unrestricted access (e.g., utility methods, getters).
- **Private** → When data should be completely encapsulated (e.g., sensitive information, internal logic).
- **Protected** → When you want to allow access within the class and subclasses, but prevent direct access from outside.

### Practical Exercise: Write a class that shows examples of each visibility type and how they restrict access to properties and methods.  

- <a href="./practical_exe_files/filelist/practical_exe_12.php">Practical Exercise 12</a>

## Type Hinting

### THEORY EXERCISE: Explain type hinting in PHP and its benefits.  

#### **Type Hinting in PHP**
- Type hinting (also called **type declarations**) in PHP is a feature that allows specifying the expected data type of function parameters, return values, and class properties.  
- It ensures that the provided arguments match the expected types, leading to more robust and error-free code.

#### **1. Type Hinting for Function Parameters**
- You can specify the expected type for function parameters.
- Example: Type Hinting for Basic Data Types
```php
function addNumbers(int $a, int $b) {
    return $a + $b;
}

echo addNumbers(5, 10);  // 15
// echo addNumbers(5, "10");  // TypeError in strict mode
```

#### **2. Type Hinting for Return Types**
- You can also specify the return type of a function.
- Example: Function Return Type Declaration
```php
function getGreeting(string $name): string {
    return "Hello, " . $name;
}

echo getGreeting("Ramesh");  // Hello, Ramesh
```

- If the function does not return the expected type, a `TypeError` will occur.

#### **3. Type Hinting for Class Properties (PHP 7.4+)**
- PHP 7.4 introduced **typed properties**, allowing type hints for class attributes.
- Example: Typed Class Properties
```php
class User {
    public int $id;
    public string $name;

    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

$user = new User(1, "Ramesh");
echo $user->name;  // Ramesh
```

#### **4. Type Hinting for Objects and Arrays**
- You can enforce that parameters must be specific objects or arrays.
- Example: Object Type Hinting
```php
class Order {
    public function process(User $user) {
        echo "Processing order for " . $user->name;
    }
}

$order = new Order();
$user = new User(2, "Ramesh");
$order->process($user);  // Processing order for Ramesh
```

- Example: Array Type Hinting
```php
function printNames(array $names) {
    foreach ($names as $name) {
        echo $name . "\n";
    }
}

printNames(["Nirav", "More"]);  // Works fine
```

#### **5. Nullable Types (PHP 7.1+)**
- You can allow `null` values by using a question mark `?` before the type.
- Example: Nullable Type Hinting
```php
function setAge(?int $age) {
    return $age ?? "Age not provided";
}

echo setAge(25);  // 25
echo setAge(null);  // Age not provided
```

#### **6. Union Types (PHP 8.0+)**
- PHP 8.0 introduced **union types**, allowing multiple possible types.
- Example: Union Type Hinting
```php
function getData(int|string $value): string {
    return "Value: " . $value;
}

echo getData(10);  // Value: 10
echo getData("Hello");  // Value: Hello
```

#### **7. Mixed Type (PHP 8.0+)**
- `mixed` is a special type that accepts any value.
- Example: Using `mixed`
```php
function processData(mixed $data) {
    if (is_array($data)) {
        return "Array provided";
    }
    return "Data: " . $data;
}

echo processData(["PHP", "Type Hinting"]);  // Array provided
echo processData(100);  // Data: 100
```

#### **Benefits of Type Hinting**
- **Error Prevention:** Prevents unintended data type mismatches.  
- **Code Readability:** Makes it clear what data type is expected.  
- **Better Debugging:** Catches type errors early.  
- **Performance Optimization:** Helps PHP optimize function calls.  
- **Easier Refactoring:** Reduces the risk of breaking changes.  

### Practical Exercise: Write a method in a class that accepts type-hinted parameters and demonstrate how it works with different data types. 

- <a href="./practical_exe_files/filelist/practical_exe_13.php">Practical Exercise 13</a>

## Final Keyword

### THEORY EXERCISE: Discuss the purpose of the final keyword in PHP and how it affects classes and methods.  

- In PHP, the `final` keyword is used to prevent further modification of classes and methods.  
- It ensures that certain parts of the code remain unchanged by subclasses, providing a way to enforce immutability and maintain code integrity.

#### **Usage of `final` in PHP**
**1. `final` with Methods**  

- When a method is declared as `final`, it cannot be overridden by any subclass.  
- This is useful when you want to enforce specific behavior in a parent class that must remain unchanged.
- Example:
```php
class Base {
    final public function importantFunction() {
        echo "This function cannot be overridden.";
    }
}

class Derived extends Base {
    // Attempting to override will result in a fatal error
    // public function importantFunction() {
    //     echo "Trying to override";
    // }
}
```
- If you try to override `importantFunction()` in the `Derived` class, PHP will throw a **Fatal Error**.

**2. `final` with Classes**
- When a class is declared as `final`, it cannot be extended (inherited) by any other class.  
- This ensures that the class's functionality remains unchanged.
- Example:
```php
final class Utility {
    public function helperFunction() {
        echo "This class cannot be extended.";
    }
}

// This will cause a Fatal Error
// class ExtendedUtility extends Utility {
// }
```
- Since `Utility` is marked as `final`, attempting to create a subclass (`ExtendedUtility`) results in a **Fatal Error**.

#### **Why Use `final`?**
- **Prevents Inheritance Issues**: Stops unintended modifications in child classes that could break functionality.
- **Enhances Security**: Ensures that critical methods remain unchanged.
- **Improves Performance**: Helps PHP's optimizer by reducing the complexity of method resolution.

However, overusing `final` can reduce flexibility, making code less extendable. It is best used when you want to enforce strict behavior in core logic.

### Practical Exercise: Create a class marked as final and attempt to extend it to show the restriction. 

- <a href="./practical_exe_files/filelist/practical_exe_14.php">Practical Exercise 14</a>

## Email Security Function

### THEORY EXERCISE: Explain the importance of email security and common practices to ensure secure email transmission.  

#### **Importance of Email Security**  
- Email security is crucial because emails are a primary communication method for individuals and businesses, often containing sensitive data, financial information, or authentication credentials. 
- Poor email security can lead to:  
    - **Phishing Attacks** – Hackers use fake emails to steal sensitive information.  
    - **Data Breaches** – Unencrypted emails can be intercepted, exposing confidential data.  
    - **Malware & Ransomware** – Malicious attachments or links can infect systems.  
    - **Spoofing & Identity Theft** – Attackers can forge email addresses to impersonate legitimate senders.  

#### **Common Practices for Secure Email Transmission**  
**1. Use Strong Authentication Methods**  
- Implement **Multi-Factor Authentication (MFA)** to add an extra security layer beyond passwords.  
- Use **strong, unique passwords** and update them regularly.  

**2. Encrypt Emails for Confidentiality**  
- **TLS Encryption (Transport Layer Security)**: Ensures emails are encrypted during transmission.  
- **End-to-End Encryption (PGP or S/MIME)**: Protects emails from being read by unauthorized parties.  

**3. Enable Email Security Protocols**  
- **SPF (Sender Policy Framework)**: Prevents spoofing by verifying sender IP addresses.  
- **DKIM (DomainKeys Identified Mail)**: Ensures email integrity by adding a digital signature.  
- **DMARC (Domain-based Message Authentication, Reporting & Conformance)**: Protects against phishing by enforcing SPF and DKIM policies.  

**4. Beware of Phishing and Social Engineering**  
- Do **not click on suspicious links or attachments** from unknown senders.  
- Verify email sender authenticity, especially for financial transactions.  

**5. Secure Your Email Server**  
- Keep mail server software **updated** to patch security vulnerabilities.  
- Use **firewalls and anti-malware tools** to protect email infrastructure.  
- Implement **rate-limiting and filtering** to prevent spam and DDoS attacks.  

**6. Use a Secure Email Provider**  
- Choose an email provider that supports **strong encryption** and **advanced security features** like Google Workspace or ProtonMail.  

**7. Regularly Monitor and Train Employees**  
- Conduct **security awareness training** to help users identify threats.  
- Implement **email logging and monitoring** for suspicious activities.  

By following these best practices, organizations and individuals can significantly reduce the risks associated with email-based threats.

### Practical Exercise: Write a function that sanitizes email input and validates it before sending. 

- <a href="./practical_exe_files/filelist/practical_exe_15.php">Practical Exercise 15</a>

## File Handling

### THEORY EXERCISE: Discuss file handling in PHP, including opening, reading, writing, and closing files.  

#### **File Handling in PHP**  
- File handling in PHP allows you to create, read, write, and manage files on the server.  
- PHP provides built-in functions to perform these operations efficiently.

#### **1. Opening a File (`fopen()`)**  
- To work with a file, you first need to open it using `fopen()`.  
- This function requires two parameters:  
    - **Filename**: The file to be opened.  
    - **Mode**: The file operation mode (read, write, append, etc.).  

#### **File Opening Modes:**
| Mode  | Description |
|--------|-------------|
| `"r"`  | Read-only. File must exist. |
| `"r+"` | Read & write. File must exist. |
| `"w"`  | Write-only. Creates a new file or truncates an existing one. |
| `"w+"` | Read & write. Creates a new file or truncates an existing one. |
| `"a"`  | Append. Creates a file if it doesn’t exist. |
| `"a+"` | Read & append. Creates a file if it doesn’t exist. |
| `"x"`  | Write-only. Fails if the file exists. |
| `"x+"` | Read & write. Fails if the file exists. |

#### **Example: Opening a File**
```php
<?php
$file = fopen("example.txt", "r") or die("Unable to open file!");
?>
```

#### **2. Reading a File**
- PHP provides several functions to read file content:  
- **`fread()` – Read a Specific Number of Bytes**
```php
<?php
$file = fopen("example.txt", "r");
$content = fread($file, filesize("example.txt"));
echo $content;
fclose($file);
?>
```

- **`fgets()` – Read One Line at a Time**
```php
<?php
$file = fopen("example.txt", "r");
while (!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
?>
```

#### **`file_get_contents()` – Read the Whole File into a String**
```php
<?php
$content = file_get_contents("example.txt");
echo $content;
?>
```

#### **3. Writing to a File**
To write to a file, use `fwrite()` or `file_put_contents()`.

#### **`fwrite()` – Write Data to a File**
```php
<?php
$file = fopen("example.txt", "w");
fwrite($file, "Hello, World!\n");
fclose($file);
?>
```
- `"w"` mode will erase existing content. Use `"a"` mode to append.

#### **`file_put_contents()` – Write Directly**
```php
<?php
file_put_contents("example.txt", "New content here!");
?>
```

#### **4. Closing a File (`fclose()`)**
Always close a file after reading or writing to free system resources.

```php
<?php
$file = fopen("example.txt", "r");
fclose($file);
?>
```

#### **5. Checking if a File Exists (`file_exists()`)**
```php
<?php
if (file_exists("example.txt")) {
    echo "File exists.";
} else {
    echo "File does not exist.";
}
?>
```

#### **6. Deleting a File (`unlink()`)**
```php
<?php
if (file_exists("example.txt")) {
    unlink("example.txt");
    echo "File deleted.";
} else {
    echo "File does not exist.";
}
?>
```

- PHP provides powerful file-handling functions to open, read, write, and close files efficiently.  
- Always handle files carefully, especially when writing or deleting, to avoid data loss.

### Practical Exercise: Create a script that reads from a text file and displays its content on a web page.

- <a href="./practical_exe_files/filelist/practical_exe_16.php">Practical Exercise 16</a>

## Handling Emails

### THEORY EXERCISE: Explain how to send emails in PHP using the mail() function and the importance of validating email addresses.  

#### **Sending Emails in PHP Using the `mail()` Function**  

- PHP provides the `mail()` function for sending emails, but it requires a properly configured mail server (such as **Sendmail**, **Postfix**, or **SMTP**) to work correctly.

#### **1. Basic Syntax of `mail()`**
```php
mail(to, subject, message, headers, parameters);
```
- **to** – Recipient's email address  
- **subject** – Subject of the email  
- **message** – Email body  
- **headers** – Additional email headers (e.g., `From`, `Reply-To`)  
- **parameters** – Optional, used to specify additional options  

#### **2. Example: Sending a Basic Email**
```php
<?php
$to = "recipient@example.com";
$subject = "Test Email";
$message = "Hello, this is a test email from PHP.";
$headers = "From: sender@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
```

- The `mail()` function does not return an error message if the email fails to send.
- It requires a working mail server.

#### **3. Using Additional Headers**
- You can add extra headers, such as `Reply-To`, `CC`, `BCC`, and `Content-Type`:
```php
<?php
$to = "recipient@example.com";
$subject = "HTML Email Test";
$message = "<h1>Hello!</h1><p>This is an <b>HTML</b> email.</p>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: sender@example.com" . "\r\n";
$headers .= "Reply-To: reply@example.com" . "\r\n";
$headers .= "CC: cc@example.com" . "\r\n";
$headers .= "BCC: bcc@example.com" . "\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "HTML Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
```

- Setting `"MIME-Version: 1.0"` and `"Content-type: text/html"` allows sending HTML emails.
- `Reply-To`, `CC`, and `BCC` add more functionality.

#### **4. Validating Email Addresses**
- To prevent email spoofing and errors, always validate email addresses before sending.

#### **Using `filter_var()` to Validate an Email**
```php
<?php
$email = "user@example.com";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email address.";
} else {
    echo "Invalid email address.";
}
?>
```
**Why is Email Validation Important?**
- Prevents sending emails to invalid addresses.
- Reduces the chance of being marked as spam.
- Improves reliability and security.

#### **5. Using PHPMailer for Advanced Emailing (Recommended)**
- The `mail()` function has limitations, especially for sending emails via SMTP.  - A better alternative is **PHPMailer**, which supports SMTP authentication and attachments.

#### **Install PHPMailer via Composer**
```sh
composer require phpmailer/phpmailer
```

#### **Send Email Using PHPMailer**
```php
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@example.com';
    $mail->Password = 'your_password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com');

    $mail->isHTML(true);
    $mail->Subject = 'Test Email with PHPMailer';
    $mail->Body = '<h1>Hello!</h1><p>This is a test email.</p>';

    $mail->send();
    echo "Email sent successfully!";
} catch (Exception $e) {
    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
}
?>
```
**Why Use PHPMailer?**
- Supports SMTP authentication  
- Allows sending attachments  
- Better error handling  
- More secure than `mail()`

**Conclusion**
- The `mail()` function is useful for simple emails but requires a mail server.  
- Always **validate email addresses** before sending.  
- Use **PHPMailer** for advanced email handling, including SMTP authentication and HTML emails.

### Practical Exercise: Write a PHP script to send a test email to a user using the mail() function.  

- <a href="./practical_exe_files/filelist/practical_exe_17.php">Practical Exercise 17</a>

## MVC Architecture

### THEORY EXERCISE: Discuss the Model-View-Controller (MVC) architecture and its advantages in web development.  

- The **Model-View-Controller (MVC)** architecture is a design pattern used in web development to separate application logic into three interconnected components:  
    1. **Model** – Handles data and business logic.  
    2. **View** – Manages the user interface (UI).  
    3. **Controller** – Handles user input and interacts with the Model and View.  

- This separation makes code modular, maintainable, and scalable.

#### Model (Data & Business Logic)
- Represents the application's **data structure**.
- Interacts with the **database** (CRUD operations: Create, Read, Update, Delete).
- Implements business logic and validation.
- Example (Model in PHP)  

```php
class UserModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getUser($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
```

#### View (User Interface)
- Responsible for displaying data to the user.
- Renders HTML, CSS, and JavaScript.
- Does **not contain** business logic.
- Example (View in PHP)
```php
<!-- user_view.php -->
<h1>User Profile</h1>
<p>Name: <?php echo $user['name']; ?></p>
<p>Email: <?php echo $user['email']; ?></p>
```

#### Controller (Request Handling)
- Accepts user input (e.g., form submissions, URL requests).
- Calls the appropriate **Model** to fetch or modify data.
- Loads the **View** to display the data.
- Example (Controller in PHP)

```php
// user_controller.php
require 'UserModel.php';
require 'db.php'; // Database connection

$userModel = new UserModel($db);
$user = $userModel->getUser($_GET['id']);

require 'user_view.php'; // Load the view
```

**How MVC Works in Web Applications**
1. **User requests a URL** → `example.com/user/1`
2. **Controller processes the request** and interacts with the Model.
3. **Model fetches data** from the database.
4. **Controller sends data** to the View.
5. **View renders the response** (HTML page).

#### **Advantages of MVC in Web Development**  

- **Separation of Concerns (SoC)** – Each component handles a specific role, improving maintainability.  
- **Code Reusability** – Models and Views can be reused in multiple parts of the application.  
- **Scalability** – Easier to scale applications by adding new models, views, and controllers.  
- **Easier Collaboration** – Developers can work on different parts of the application simultaneously (e.g., frontend & backend teams).  
- **Security** – Business logic is separated from the view, reducing direct access to data.  
- Many PHP frameworks use MVC, such as: **Laravel**, **CodeIgniter**, **Symfony**, **CakePHP** 

#### **Conclusion**
- MVC is a **powerful architecture** that enhances code **organization, maintainability, and scalability** in web development.  
- If you're building large applications, using an MVC framework like Laravel can significantly improve development efficiency.

### Practical Exercise: Create a simple MVC application that demonstrates the separation of concerns by implementing a basic "User" module with a model, view, and controller.  

- <a href="./practical_exe_files/filelist/practical_exe_18.php">Practical Exercise 18</a>

## Practical Example: Implementation of all the OOPs Concepts

### Practical Exercise: Develop a mini project (e.g., a Library Management System) that utilizes all OOP concepts like classes, inheritance, interfaces, magic methods, etc. 

- <a href="./practical_exe_files/filelist/practical_exe_19.php">Practical Exercise 19</a>

## Connection with MySQL Database

### THEORY EXERCISE: Explain how to connect PHP to a MySQL database using mysqli or PDO. 

#### **Connecting PHP to a MySQL Database Using `mysqli` and `PDO`**  

- To connect PHP to a MySQL database, you can use **`mysqli`** (MySQL Improved) or **`PDO`** (PHP Data Objects).  
- Both approaches allow executing SQL queries, retrieving data, and managing transactions.

#### **1. Connecting Using `mysqli` (Procedural & Object-Oriented)**
- The **`mysqli`** extension provides two ways to connect:  
    - **Procedural Style**  
    - **Object-Oriented Style**

#### **(A) `mysqli` Procedural Connection**

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully!";
?>
```

**✅ Pros:** Simple and easy to use.  
**❌ Cons:** Less secure and harder to maintain in large projects.

#### **(B) `mysqli` Object-Oriented Connection**
```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
```
**✅ Pros:** More structured and reusable.  
**❌ Cons:** Still limited compared to `PDO`.

#### **2. Connecting Using `PDO` (Preferred for Security & Flexibility)**
- The **`PDO` (PHP Data Objects)** extension provides a more secure, flexible, and object-oriented approach.

#### **(A) `PDO` Connection**
```php
<?php
$dsn = "mysql:host=localhost;dbname=test_db;charset=utf8mb4";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Enable error reporting
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Fetch results as associative array
        PDO::ATTR_EMULATE_PREPARES => false,  // Prevent SQL injection
    ]);
    echo "Connected successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
```
**✅ Pros:**  
- Supports multiple databases (MySQL, PostgreSQL, SQLite, etc.).  
- More secure (prevents SQL injection by default).  
- Better error handling and prepared statements.

**❌ Cons:** Slightly more complex than `mysqli`.

#### **3. Executing Queries (`mysqli` vs. `PDO`)**
- **(A) Inserting Data**
    - **`mysqli` Procedural**
        ```php
        $sql = "INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com')";
        mysqli_query($conn, $sql);
        ```
    - **`mysqli` Object-Oriented**
        ```php
        $sql = "INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com')";
        $conn->query($sql);
        ```
    - **`PDO` (More Secure)**
        ```php
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->execute(['name' => 'John Doe', 'email' => 'john@example.com']);
        ```

- **(B) Fetching Data**
    - **`mysqli` Procedural**
        ```php
        $result = mysqli_query($conn, "SELECT * FROM users");
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['name'] . "<br>";
        }
        ```

    - **`mysqli` Object-Oriented**
        ```php
        $result = $conn->query("SELECT * FROM users");
        while ($row = $result->fetch_assoc()) {
            echo $row['name'] . "<br>";
        }
        ```

    - **`PDO` (Preferred)**
        ```php
        $stmt = $pdo->query("SELECT * FROM users");
        foreach ($stmt as $row) {
            echo $row['name'] . "<br>";
        }
        ```

#### **4. Closing the Connection**

- **`mysqli`**

    ```php
    mysqli_close($conn); // Procedural
    $conn->close(); // Object-Oriented
    ```
- **`PDO`**

    ```php
    $pdo = null; // Simply set it to null
    ```

#### **5. Why Choose `PDO` Over `mysqli`?**

| Feature | `mysqli` | `PDO` |
|---------|---------|-------|
| Database Support | Only MySQL | Supports multiple databases (MySQL, PostgreSQL, SQLite, etc.) |
| Security | Requires manual escaping | Uses prepared statements (prevents SQL injection) |
| Object-Oriented | Yes | Yes (More structured) |
| Error Handling | Basic error handling | Exception-based error handling |
| Performance | Similar for MySQL | Slightly better for complex queries |

- Use `PDO` for better security, flexibility, and multi-database support.**
- **`mysqli`** is good for simple MySQL applications but lacks flexibility.  
- **`PDO`** is the recommended choice due to **better security, multi-database support, and prepared statements**.  

### Practical Exercise: Write a script to establish a database connection and handle any errors during the connection process.

- <a href="./practical_exe_files/filelist/practical_exe_20.php">Practical Exercise 20</a>

## SQL Injection

### THEORY EXERCISE: Define SQL injection and its implications on security. 

#### **SQL Injection and Its Security Implications**  

- SQL Injection (**SQLi**) is a **cyber attack** where an attacker manipulates SQL queries by injecting **malicious SQL code** into input fields (such as login forms, search boxes, or URL parameters).  
- This allows attackers to **bypass authentication**, **access sensitive data**, **modify databases**, and even **execute system commands**.

#### **2. How SQL Injection Works**
- SQL Injection occurs when user inputs are **directly included in SQL queries** without proper validation or sanitization.  
- Attackers exploit **vulnerable input fields** to inject malicious SQL statements.

#### **Example of a Vulnerable PHP Code (Using `mysqli`)**

```php
<?php
$conn = new mysqli("localhost", "root", "", "test_db");

$username = $_GET['username']; // User input from URL: ?username=admin
$password = $_GET['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Login successful!";
} else {
    echo "Invalid credentials!";
}
?>
```

#### **🚨 SQL Injection Attack**
- An attacker can input:
```
username=admin' -- 
password=anything
```
- This modifies the SQL query as:
```sql
SELECT * FROM users WHERE username = 'admin' -- ' AND password = 'anything'
```
- The `--` comments out the rest of the query, allowing the attacker to log in **without a valid password**.

#### **3. Consequences of SQL Injection**

✅ **Bypassing Authentication** – Attackers can gain unauthorized access.  
✅ **Data Theft** – Sensitive information (emails, passwords, credit card details) can be exposed.  
✅ **Data Manipulation** – Hackers can modify, delete, or insert data.  
✅ **Database Corruption** – Attackers can delete entire tables (`DROP TABLE users`).  
✅ **System Takeover** – In extreme cases, attackers can execute system commands, gaining full control of the server.

#### **4. Preventing SQL Injection**

- **(A) Use Prepared Statements (Parameterized Queries)**  
    - Prepared statements **separate SQL logic from user input**, preventing malicious injection.  
    - **✅ Secure PHP Code (Using `mysqli` Prepared Statements)**
    ```php
    <?php
    $conn = new mysqli("localhost", "root", "", "test_db");

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    $username = $_GET['username'];
    $password = $_GET['password'];

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid credentials!";
    }
    ?>
    ```

    - **✅ Secure PHP Code (Using `PDO` Prepared Statements)**
    ```php
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute([
        'username' => $_GET['username'],
        'password' => $_GET['password']
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid credentials!";
    }
    ?>
    ```

- **(B) Use Input Validation and Sanitization**
    - Ensure input fields contain only **expected values** (e.g., letters and numbers).
    - Remove special characters using `filter_var()`.
    ```php
    $username = filter_var($_GET['username'], FILTER_SANITIZE_STRING);
    ```

- **(C) Use Least Privilege Database Accounts**

    - Create **database users with minimal privileges** to reduce the impact of an attack.
    - Avoid using **root** access in your database connections.

- **🔹 (D) Disable Display of SQL Errors**
    - Attackers can exploit detailed error messages. Hide SQL errors in production:
    ```php
    ini_set('display_errors', 0);
    error_reporting(0);
    ```

- **SQL Injection is one of the most dangerous security threats** that can lead to **data theft, unauthorized access, and database destruction**.  

**Prevention Strategies:**  
- Always **use prepared statements** (`mysqli` or `PDO`).  
- **Validate and sanitize** user input.  
- **Use least privilege** database accounts.  
- **Disable error messages** in production.  

### Practical Exercise: Demonstrate a vulnerable SQL query and then show how to prevent SQL injection using prepared statements. 

- <a href="./practical_exe_files/filelist/practical_exe_21.php">Practical Exercise 21</a>

## Practical: Exception Handling with Try-Catch for Database Connection and Queries  

- <a href="./practical_exe_files/filelist/practical_exe_22.php">Practical Exercise 22</a>

### Practical Exercise: Implement try-catch blocks in a PHP script to handle exceptions for database connection and query execution.  

- <a href="./practical_exe_files/filelist/practical_exe_23.php">Practical Exercise 23</a>

## Server-Side Validation while Registration using Regular Expressions 

### Practical Exercise: Write a registration form that validates user input (e.g., email, password) using regular expressions before submission.  

- <a href="./practical_exe_files/filelist/practical_exe_24.php">Practical Exercise 24</a>

## Send Mail While Registration

### Practical Exercise: Extend the registration form to send a confirmation email upon successful registration.  

- <a href="./practical_exe_files/filelist/practical_exe_25.php">Practical Exercise 25</a>

## Session and Cookies

### THEORY EXERCISE: Explain the differences between sessions and cookies in PHP.



### Practical Exercise: Write a script to create a session and store user data, and then retrieve it on a different page. Also, demonstrate how to set and retrieve a cookie.  

- <a href="./practical_exe_files/filelist/practical_exe_26.php">Practical Exercise 26</a>

## File Upload

### THEORY EXERCISE: Discuss file upload functionality in PHP and its security implications. 

### Practical Exercise: Create a file upload form that allows users to upload files and handle the uploaded files safely on the server.  

- <a href="./practical_exe_files/filelist/practical_exe_27.php">Practical Exercise 27</a>

## PHP with MVC Architecture

### Practical Exercise: Implement a CRUD application (Create, Read, Update, Delete) using the MVC architecture to manage user data.  

- <a href="./practical_exe_files/filelist/practical_exe_28.php">Practical Exercise 28</a>

## Insert, Update, Delete MVC

### Practical Exercise: Extend the CRUD application to include functionalities for inserting, updating, and deleting user records, ensuring proper separation of concerns in the MVC structure.  

- <a href="./practical_exe_files/filelist/practical_exe_29.php">Practical Exercise 29</a>

## Extra Practise for Grade A

### 1. Practical Exercise: Develop a class hierarchy for a simple e-commerce system with classes like `Product`, `Category`, and `Order`. Implement encapsulation by using private properties and public methods to access them.  

- <a href="./practical_exe_files/filelist/practical_exe_30.php">Practical Exercise 30</a>

## Class

### 2. Practical Exercise: Create a class called `Book` with properties like `title`, `author`, and `price`. Implement a method to apply a discount to the book's price and return the new price.  

- <a href="./practical_exe_files/filelist/practical_exe_31.php">Practical Exercise 31</a>

## Object

### 3. Practical Exercise: Instantiate an object of the `Book` class and demonstrate the usage of its methods. Create multiple instances of `Book` and display their details in a formatted manner.  

- <a href="./practical_exe_files/filelist/practical_exe_32.php">Practical Exercise 32</a>

## Extends

### 4. Practical Exercise: Create a base class called `Employee` with properties like `name` and `salary`. Extend it with subclasses `FullTimeEmployee` and `PartTimeEmployee`, each having specific methods to calculate bonuses.  

- <a href="./practical_exe_files/pe33.php">Practical Exercise 33</a>

## Overloading

### 5. Practical Exercise: Create a `Calculator` class with a method `calculate` that can add, subtract, or multiply based on the number and type of arguments passed. 

- <a href="./practical_exe_files/pe34.php">Practical Exercise 34</a>

## Abstraction Interface

### 6. Practical Exercise: Define an interface `PaymentInterface` with methods like `processPayment()`, `refund()`, and implement it in classes like `CreditCardPayment` and `PaypalPayment`.  

- <a href="./practical_exe_files/pe35.php">Practical Exercise 35</a>

## Constructor

### 7. Practical Exercise: Create a class `Student` with properties like `name`, `age`, and `grade`. Use a constructor to initialize these properties and a method to display student details.  

- <a href="./practical_exe_files/pe36.php">Practical Exercise 36</a>

## Destructor

### 8. Practical Exercise: Write a class that connects to a database, with a destructor that closes the connection when the object is destroyed.  

- <a href="./practical_exe_files/pe37.php">Practical Exercise 37</a>

## Magic Methods

### 9. Practical Exercise: Create a class that uses the `__set()` and `__get()` magic methods to dynamically create and access properties based on user input.  

- <a href="./practical_exe_files/pe38.php">Practical Exercise 38</a>

## Scope Resolution

### 10. Practical Exercise: Define a class with static properties and methods to keep track of the number of instances created. Use the scope resolution operator to access these static members.  

- <a href="./practical_exe_files/pe39.php">Practical Exercise 39</a>

## Traits

### 11. Practical Exercise: Create two traits: `Logger` and `Notifier`. Use these traits in a class `User` to log user activities and send notifications.  

- <a href="./practical_exe_files/pe40.php">Practical Exercise 40</a>

## Visibility

### 12. Practical Exercise: Develop a class `Account` with properties for `username` (public), `password`(private), and `accountBalance` (protected). Demonstrate how to access these properties in a derived class.  

- <a href="./practical_exe_files/pe41.php">Practical Exercise 41</a>

## Type Hinting

### 13. Practical Exercise: Write a method in a class `Order` that accepts an array of products (type-hinted)and calculates the total order amount.  

- <a href="./practical_exe_files/pe42.php">Practical Exercise 42</a>

## Final Keyword

### 14. Practical Exercise: Create a base class `Animal` and a final class `Dog`. Attempt to extend `Dog` and demonstrate the restriction imposed by the `final` keyword.  

- <a href="./practical_exe_files/pe43.php">Practical Exercise 43</a>

## Email Security Function

### 15. Practical Exercise: Write a function that sanitizes user input for an email address, validates it, and throws an exception if it fails validation.  

- <a href="./practical_exe_files/pe44.php">Practical Exercise 44</a>

## File Handling

### 16. Practical Exercise: Create a script that uploads a file and reads its content. Implement error handling to manage any file-related exceptions.  

- <a href="./practical_exe_files/pe45.php">Practical Exercise 45</a>

## Handling Emails

### 17. Practical Exercise: Develop a function to send a welcome email to a user upon registration, ensuring the email format is validated first.  

- <a href="./practical_exe_files/pe46.php">Practical Exercise 46</a>

## MVC Architecture

### 18. Practical Exercise: Extend the simple MVC application to include a model for managing user profiles, a view for displaying user details, and a controller for handling user actions.  

- <a href="./practical_exe_files/pe47.php">Practical Exercise 47</a>

## Practical Example: Implementation of all the OOPs Concepts

### 19. Practical Exercise: Develop a project that simulates a library system with classes for User, Book, and Transaction, applying all OOP principles.  

- <a href="./practical_exe_files/pe48.php">Practical Exercise 48</a>

## Connection with MySQL Database

### 20. Practical Exercise: Write a class `Database` that handles database connections and queries. Use this class in another script to fetch user data from a `users` table.  

- <a href="./practical_exe_files/pe49.php">Practical Exercise 49</a>

## SQL Injection

### 21. Practical Exercise: Create a vulnerable PHP script that demonstrates SQL injection. Then, rewrite it using prepared statements to prevent SQL injection attacks.  

- <a href="./practical_exe_files/pe50.php">Practical Exercise 50</a>

## Practical: Exception Handling with Try-Catch for Database Connection and Queries

### 22. Practical Exercise: Implement a complete registration process with a database connection that uses try-catch blocks to handle exceptions for all operations.

- <a href="./practical_exe_files/pe51.php">Practical Exercise 51</a>

## Server-Side Validation while Registration using Regular Expressions

### 23. Practical Exercise: Write a PHP script that validates user inputs (username, password, email) using regular expressions, providing feedback on any validation errors.  

- <a href="./practical_exe_files/pe52.php">Practical Exercise 52</a>

## Send Mail While Registration

### 24. Practical Exercise: Extend the registration process to send a confirmation email to the user after successful registration and validate the email format.  

- <a href="./practical_exe_files/pe53.php">Practical Exercise 53</a>

## Session and Cookies

### 25. Practical Exercise: Implement a login system that uses sessions to keep track of user authentication and demonstrates cookie usage for "Remember Me" functionality. 

- <a href="./practical_exe_files/pe54.php">Practical Exercise 54</a>

## File Upload

### 26. Practical Exercise: Create a file upload feature that allows users to upload images. Ensure that the uploaded images are checked for file type and size for security.  

- <a href="./practical_exe_files/pe55.php">Practical Exercise 55</a>

## PHP with MVC Architecture

### 27. Practical Exercise: Build a small blog application using the MVC architecture, where users can create, read, update, and delete posts.  

- <a href="./practical_exe_files/pe56.php">Practical Exercise 56</a>

## Insert, Update, Delete MVC

### 28. Practical Exercise: Expand the blog application to include a feature for user comments, allowing users to insert, update, and delete their comments. 

- <a href="./practical_exe_files/pe57.php">Practical Exercise 57</a>
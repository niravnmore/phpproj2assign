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

- <a href="./practical_exe_files/pe01.php">Practical Exercise 01</a>

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

- <a href="./practical_exe_files/pe02.php">Practical Exercise 02</a>

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

- <a href="./practical_exe_files/pe03.php">Practical Exercise 03</a>

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

- <a href="./practical_exe_files/pe04.php">Practical Exercise 04</a>

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

- <a href="./practical_exe_files/pe05.php">Practical Exercise 05</a>

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

### Practical Exercise: Define an interface named `VehicleInterface` with methods like `start()`, `stop()`, and implement this interface in multiple classes. 

- <a href="./practical_exe_files/pe06.php">Practical Exercise 06</a>

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

## Visibility

### Q. Discuss the visibility of properties and methods in PHP (public, private, protected). 

### Practical Exercise: Write a class that shows examples of each visibility type and how they restrict access to properties and methods.  

## Type Hinting

### THEORY EXERCISE: Explain type hinting in PHP and its benefits.  

### Practical Exercise: Write a method in a class that accepts type-hinted parameters and demonstrate howit works with different data types. 

## Final Keyword

### THEORY EXERCISE: Discuss the purpose of the final keyword in PHP and how it affects classes and methods.  

### Practical Exercise: Create a class marked as final and attempt to extend it to show the restriction. 

## Email Security Function

### THEORY EXERCISE: Explain the importance of email security and common practices to ensure secure email transmission. 

### Practical Exercise: Write a function that sanitizes email input and validates it before sending. 

## File Handling

### THEORY EXERCISE: Discuss file handling in PHP, including opening, reading, writing, and closing files.  

### Practical Exercise: Create a script that reads from a text file and displays its content on a web page.

## Handling Emails

### THEORY EXERCISE: Explain how to send emails in PHP using the mail() function and the importance of validating email addresses.  

### Practical Exercise: Write a PHP script to send a test email to a user using the mail() function.  

## MVC Architecture

### THEORY EXERCISE: Discuss the Model-View-Controller (MVC) architecture and its advantages in web development.  

### Practical Exercise: Create a simple MVC application that demonstrates the separation of concerns by implementing a basic "User" module with a model, view, and controller. 

## Practical Example: Implementation of all the OOPs Concepts

### Practical Exercise: Develop a mini project (e.g., a Library Management System) that utilizes all OOP concepts like classes, inheritance, interfaces, magic methods, etc. 

## Connection with MySQL Database

### THEORY EXERCISE: Explain how to connect PHP to a MySQL database using mysqli or PDO. 

### Practical Exercise: Write a script to establish a database connection and handle any errors during the connection process.

## SQL Injection

### THEORY EXERCISE: Define SQL injection and its implications on security. 

### Practical Exercise: Demonstrate a vulnerable SQL query and then show how to prevent SQL injection using prepared statements. 

## Practical: Exception Handling with Try-Catch for Database Connection and Queries  

### Practical Exercise: Implement try-catch blocks in a PHP script to handle exceptions for database connection and query execution.  

## Server-Side Validation while Registration using Regular Expressions 

### Practical Exercise: Write a registration form that validates user input (e.g., email, password) using regular expressions before submission.  

## Send Mail While Registration

### Practical Exercise: Extend the registration form to send a confirmation email upon successful registration. 

## Session and Cookies

### THEORY EXERCISE: Explain the differences between sessions and cookies in PHP.

### Practical Exercise: Write a script to create a session and store user data, and then retrieve it on a different page. Also, demonstrate how to set and retrieve a cookie. 

## File Upload

### THEORY EXERCISE: Discuss file upload functionality in PHP and its security implications. 

### Practical Exercise: Create a file upload form that allows users to upload files and handle the uploaded files safely on the server. 

## PHP with MVC Architecture

### Practical Exercise: Implement a CRUD application (Create, Read, Update, Delete) using the MVC architecture to manage user data.  

## Insert, Update, Delete MVC

### Practical Exercise: Extend the CRUD application to include functionalities for inserting, updating, and deleting user records, ensuring proper separation of concerns in the MVC structure. 

## Extra Practise for Grade A

### 1. Practical Exercise: Develop a class hierarchy for a simple e-commerce system with classes like `Product`, `Category`, and `Order`. Implement encapsulation by using private properties and public methods to access them. 

## Class

### 2. Practical Exercise: Create a class called `Book` with properties like `title`, `author`, and `price`. Implement a method to apply a discount to the book's price and return the new price. 

## Object

### 3. Practical Exercise: Instantiate an object of the `Book` class and demonstrate the usage of its methods. Create multiple instances of `Book` and display their details in a formatted manner. 

## Extends

### 4. Practical Exercise: Create a base class called `Employee` with properties like `name` and `salary`. Extend it with subclasses `FullTimeEmployee` and `PartTimeEmployee`, each having specific methods to calculate bonuses. 

## Overloading

### 5. Practical Exercise: Create a `Calculator` class with a method `calculate` that can add, subtract, or multiply based on the number and type of arguments passed. 

## Abstraction Interface

### 6. Practical Exercise: Define an interface `PaymentInterface` with methods like `processPayment()`, `refund()`, and implement it in classes like `CreditCardPayment` and `PaypalPayment`. 

## Constructor

### 7. Practical Exercise: Create a class `Student` with properties like `name`, `age`, and `grade`. Use a constructor to initialize these properties and a method to display student details. 

## Destructor

### 8. Practical Exercise: Write a class that connects to a database, with a destructor that closes the connection when the object is destroyed. 

## Magic Methods

### 9. Practical Exercise: Create a class that uses the `__set()` and `__get()` magic methods to dynamically create and access properties based on user input.

## Scope Resolution

### 10. Practical Exercise: Define a class with static properties and methods to keep track of the number of instances created. Use the scope resolution operator to access these static members. 

## Traits

### 11. Practical Exercise: Create two traits: `Logger` and `Notifier`. Use these traits in a class `User` to log user activities and send notifications. 

## Visibility

### 12. Practical Exercise: Develop a class `Account` with properties for `username` (public), `password`(private), and `accountBalance` (protected). Demonstrate how to access these properties in a derived class.  

## Type Hinting

### 13. Practical Exercise: Write a method in a class `Order` that accepts an array of products (type-hinted)and calculates the total order amount. 

## Final Keyword

### 14. Practical Exercise: Create a base class `Animal` and a final class `Dog`. Attempt to extend `Dog` and demonstrate the restriction imposed by the `final` keyword. 

## Email Security Function

### 15. Practical Exercise: Write a function that sanitizes user input for an email address, validates it, and throws an exception if it fails validation.

## File Handling

### 16. Practical Exercise: Create a script that uploads a file and reads its content. Implement error handling to manage any file-related exceptions.

## Handling Emails

### 17. Practical Exercise: Develop a function to send a welcome email to a user upon registration, ensuring the email format is validated first.

## MVC Architecture

### 18. Practical Exercise: Extend the simple MVC application to include a model for managing user profiles, a view for displaying user details, and a controller for handling user actions. 

## Practical Example: Implementation of all the OOPs Concepts

### 19. Practical Exercise: Develop a project that simulates a library system with classes for User, Book, and Transaction, applying all OOP principles. 

## Connection with MySQL Database

### 20. Practical Exercise: Write a class `Database` that handles database connections and queries. Use this class in another script to fetch user data from a `users` table. 

## SQL Injection

### 21. Practical Exercise: Create a vulnerable PHP script that demonstrates SQL injection. Then, rewrite it using prepared statements to prevent SQL injection attacks. 

## Practical: Exception Handling with Try-Catch for Database Connection and Queries

### 22. Practical Exercise: Implement a complete registration process with a database connection that uses try-catch blocks to handle exceptions for all operations.

## Server-Side Validation while Registration using Regular Expressions

### 23. Practical Exercise: Write a PHP script that validates user inputs (username, password, email) using regular expressions, providing feedback on any validation errors. 

## Send Mail While Registration

### 24. Practical Exercise: Extend the registration process to send a confirmation email to the user after successful registration and validate the email format. 

## Session and Cookies

### 25. Practical Exercise: Implement a login system that uses sessions to keep track of user authentication and demonstrates cookie usage for "Remember Me" functionality. 

## File Upload

### 26. Practical Exercise: Create a file upload feature that allows users to upload images. Ensure that the uploaded images are checked for file type and size for security.

## PHP with MVC Architecture

### 27. Practical Exercise: Build a small blog application using the MVC architecture, where users can create, read, update, and delete posts. 

## Insert, Update, Delete MVC

### 28. Practical Exercise: Expand the blog application to include a feature for user comments, allowing users to insert, update, and delete their comments
# Simple Order Deliver Service with Symfony 4.4 and Domain Driven Design.

## Purpose
1. Design and implement a domain service that will process three delivery orders (personalDelivery, personalDeliveryExpress and enterpriseDelivery).
2. Return appropriate types of objects based on the delivery type.
   1. Each delivery type can have a different workflow. 
   2. Delivery with “enterpriseDelivery” type needs to be sent off to a 3rd party API for validation of the enterprise.
   3. Delivery order coming from an email campaign needs to communicate with a separate marketing service indicating the success of the given email campaign.

---

## Technique Specification

#### Workflow
1. Call `api/sendorders` with `post` request with order content in `JSON` format to issue one or more orders.
2. Call `api/processoreders` with `post` request with authitication/key code in `JSON` format to process issued orders.
3. Call `api/confirmordres` with `post` request with authitication token/key in `JSON` format to confirm issued orders and return the confimations.

#### Tech Stack
1. Framework: Symfony 4.4
2. DB Server: Mysql 5.7
   
---

## Design

**Domain Driven Design:**
This is my first time of exposing DDD, so before I do real coding I spent some time on understanding this design concept.
Based on my research and understanding, I came up with some points of DDD:
1. **Apply:** 
   1. Use for complex application and focus on each domain, for each domain we use Ubiquitous Language to communicate with domain experts.
   2. Divide a big application into several small domains.
   3. Becomes popular nowadays with Microservice.

   
2. **Layer:** general can be three layers: 
   1. **Application**: interact with domain services.
   2. **Domain**: the domain models and the whole business logic, should not include other bundles or libs. 
   3. **Infrastracture**: bind other bundles or libs. 

---

**Code Structure in Symfony**

```bash
├── ...
├── OrderDelivery
│   ├── Api                     
│   │   ├── Controller
│   │   │── Factory
│   │   │── Service
│   ├── Domain
│   │   │── Entity
│   │   │── Repository
│   │   │── Service
│   │   │── Strategy
│   │   │── ValueObject
│   ├── Infrastructure
│   │   │── Config
│   │   │── Doctrine
│   │   │── Repository
│   │   │── Ulti
├── Tests
└───...

```
**Explaination**:

* **Api**: provides an API interface to interact with the domain services. In this example, we have three apis 
  * `api/sendorders`
  * `api/processorders`
  * `api/confirmorders`
* **Domain**: 
  * Contains the actual business logic and domain models, 
  * This layer better not including other bundles like doctrine. Just purly entities or services with business logic.
* **Infrastructure**:  
  * Bind the business logic implementation to infrastructure and frameworks, in this example, we bind routes/services and doctrine.
  * All the operations which depend on other bundles/libs should be in this layer, for example, I implement the doctrine repository service in this layer and use the type `yml` for configuring the entities instead of using annotations inside the entity which in the Domain layer. 

This app doesn't have UI interface, so there will be no presentation layer.

---

**Design Patterns**

**1. Factory Pattern** 

In Factory pattern, we create object without exposing the creation logic to the client and refer to newly created object using a common interface.

Usage: 
`Api/Factory/OrderServiceFactory`: 
The aim of this factory is to create different order service by different call (place order, process oreder and confirm order).

**2. Strategy** 
In Strategy pattern, a class behavior or its algorithm can be changed at run time. This type of design pattern comes under behavior pattern. 

Usage:
`Domain/Stategy/SendOrderStrategy`:
`Domain/Stategy/ProcessOrderStrategy`:
`Domain/Stategy/ConfirmOrderStrategy`:

As we have differnt order type with different workflows, so we use the above strategies to do differnt operations.
eg: by different order type, we have different process operations in the processOrderStrategy. 

---

**OOP**:

**1. encapsulation:**
In this code example, all the attributes have proper access modifiers. 
eg: for the **entities**: the variable are `protected` so outside classes cannot access them unless they are using getter/setter.

**2. Inheritance/abstraction:**
For the services
`Domain/Service/SendEnterpriseOrder.php` 
`Domain/Service/SendPersonalExpressOrder.php`
`Domain/Service/SendPersonalOrder.php`
They are extends `Domain/Service/SendOrder.php` so both services have can share the method `_parseGeneralFieldToEntity` and also have their own methods. 

Same implementation for the other services as well as tests.

**3. Polymorphism:**
As for the same example, we extend from some other classes, we can override some of the methods. Like the `issueOrder` method in `Domain/Service/SendOrder.php`. 

---

**SOLID principles**

This Sample followed SOLID principles:

**1. Single Responsibility Principle (SRP):**
For each class, they only have one purpose.

**2. Open closed principle(OCP):**
We cannot do any modifications after we completed these classes/functions, however, we can use `implements` from interface or `extends` from parent class to extend the functionality.

**3. Liscov Substitution Principle (LSP):**
As mentioned above in Inheritance section, we can easily access parent class's method if this method is not in `private` access.

**4. Interface Segregation Principle (ISP):**
I have multiple interfaces for different usecases, in this case the visible to the dependent class is minimized.

**5. Dependency Inversion Principle (DIP):**
I always include interface/abstract classes for both high level modules and low level moduels.


---

**Testing**:

Including functioanl testings as well as unit testings, have same structure of the Project so to improve the test coverage. 

`Note`: Not all the test cases are been implemented but I do demonstrate the design and structures for the testings. 
eg: including abastract classes or interface for each section.


---


### Usage 

#### Prerequest:

* `composer` installed
* `symfony cli` installed (if you want to run the server directly)
* `PHP 7.2+` 
* `Mysql 5.7 or higher`

#### Run:

```
// install dependencies 
composer install

// create db - you need configure the paramenters in the .env file
bin/console doctrine:database:create

// update schema
bin/console doctrine:schema:update --force

//run the server
symfony server:start

```

then I am using postman to test the apis. 
eg:
`http://127.0.0.1:8000/api/sendorders`
`http://127.0.0.1:8000/api/validateorders`
`http://127.0.0.1:8000/api/confirmorders`

---

### They are some parts not in the current version but can be improved/extended:

1. Add proper authenticate token/key when do the process and confirm order operations.
2. Process/Confirm specific orders.
3. Error Handling more user friendly.
4. Add Docker for better build/deployment process.

---

### Inspired 
There are few docs when I am doing this practice:

1. Basic DDD concepts: 
   1. https://www.codeproject.com/Articles/339725/Domain-Driven-Design-Clear-Your-Concepts-Before-Yo
   2. https://docs.microsoft.com/en-us/dotnet/architecture/microservices/microservice-ddd-cqrs-patterns/ddd-oriented-microservice
   3. https://dzone.com/articles/implementing-domain-driven-design-in-php
2. Do give me the basic structure concept: https://www.fabian-keller.de/blog/domain-driven-design-with-symfony-a-folder-structure/ 
3. Sample of DDD with Symfony: https://github.com/bencagri/symfony4-ddd

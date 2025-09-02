--! LEVEL ONE 

------- 1 ---------------     
SELECT FIRST_NAME, LAST_NAME, EMAIL 
FROM employees;

------- 2 --------------
INSERT INTO departments(department_id, department_name, manager_id, location_id) 
VALUES (280, 'Training', 101, 1700);

------- 3 --------------
UPDATE employees 
SET salary = 3000 
WHERE employee_id = 199;

------- 4 --------------
DELETE FROM jobs 
WHERE job_id = 'PR_REP';

------- 5 --------------
SELECT FIRST_NAME, LAST_NAME, HIRE_DATE 
FROM employees 
WHERE HIRE_DATE 
LIKE "2005%";

--! LEVEL TWO 

------- 6 ---------------     
SELECT FIRST_NAME, LAST_NAME, SALARY 
FROM employees 
WHERE salary 
BETWEEN 10000 AND 15000 
ORDER BY salary DESC;

------- 7 ---------------  
SELECT FIRST_NAME, LAST_NAME, EMAIL 
FROM employees 
where LAST_NAME LIKE "%son%";

------- 8 ---------------  
SELECT FIRST_NAME, LAST_NAME, SALARY 
FROM employees 
ORDER BY salary 
DESC LIMIT 5 ;

------- 9 ---------------  
SELECT FIRST_NAME, LAST_NAME, DEPARTMENT_NAME 
FROM employees 
LEFT JOIN departments 
USING(department_id);

------- 10 ---------------  
SELECT DEPARTMENT_NAME, CITY 
FROM departments 
JOIN locations 
USING(location_id) 
WHERE city LIKE "S%";

--! LEVEL THREE

------- 11 ---------------   
SELECT department_name, COUNT(employee_id) AS NUM_Employees
FROM departments 
LEFT JOIN employees
USING(department_id)
GROUP BY department_name
ORDER BY(NUM_Employees) DESC ;

------- 12 ---------------   
SELECT department_name, AVG(salary) AS Average_Salary
FROM departments
JOIN employees 
USING(department_id)
GROUP BY department_name
HAVING Average_Salary > 8000;

------- 13 ---------------   
SELECT FIRST_NAME, LAST_NAME, JOB_TITLE 
FROM employees 
JOIN jobs USING(job_id)
WHERE JOB_TITLE LIKE "%Manager%";

------- 14 ---------------  
SELECT SUM(salary) AS Total_Salary, region_name
FROM employees
JOIN departments USING (department_id)
JOIN locations USING (location_id)
JOIN countries USING (country_id)
JOIN regions USING (region_id)
GROUP BY region_name
ORDER BY(Total_Salary) DESC ;

------- 15 ---------------  
SELECT FIRST_NAME, LAST_NAME, SALARY, DEPARTMENT_NAME
FROM employees
JOIN departments USING(department_id)
WHERE salary > (SELECT AVG(salary) FROM employees);

--! LEVEL FOUR

------- 16 --------------- 
CREATE VIEW EMPLOYEE_DETAILS AS 
SELECT the FIRST_NAME, LAST_NAME,
EMAIL, JOB_TITLE, DEPARTMENT_NAME 
FROM employees
JOIN jobs USING(job_id)
JOIN departments USING(department_id);
SELECT * FROM EMPLOYEE_DETAILS;

------- 17 --------------- 
SELECT e.FIRST_NAME, e.LAST_NAME, m.HIRE_DATE
FROM employees e 
JOIN employees m ON(m.employee_id = e.manager_id)
WHERE e.hire_date > m.hire_date;

------- 18 --------------- 
SELECT DEPARTMENT_NAME, LOCATION_ID
FROM departments 
LEFT JOIN employees USING(department_id)
WHERE employee_id IS NULL;

------- 19 --------------- 


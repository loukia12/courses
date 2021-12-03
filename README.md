# API Resources

### 1. (GET) api/courses

Returns a list with all courses and their data

**Responses**

200:

```pythonb
{
    "status": 200,
    "message": "Courses fetched successfully",
    "errors": null,
    "data": [
        {
            "id": 1,
            "title": "Ux Fundementals 2",
            "description": "Course for the second semester",
            "created_at": null,
            "updated_at": "2021-12-02T00:14:12.000000Z"
        },
        {
            "id": 9,
            "title": "UX",
            "description": "Sixth Semester",
            "created_at": "2021-12-01T23:40:30.000000Z",
            "updated_at": "2021-12-02T22:52:43.000000Z"
        }
}
```

500:

```pythonb
{
    "status": 500,
    "message": "Internal Server Error",
    "data": null
}
```

---

### 2. (GET) api/courses/{course_id}

_Returns the data of a specific course_

**Parameters**

```bash
course_id | Required - Integer
```

**Responses**

200:

```pythonb
{
    "status": 200,
    "message": "Course with id 19 fetched successfully",
    "errors": null,
    "data": {
        "id": 19,
        "title": "Learning Machine",
        "description": "Sixth semester",
        "created_at": "2021-12-02T22:35:29.000000Z",
        "updated_at": null
    }
}
```

404:

```pythonb
{
    "status": 404,
    "message": "Course with id 2 does not exist",
    "data": null
}
```

400:

```pythonb
{
    "status": 400,
    "message": "Validation Error",
    "errors": {
        "id": [
            "validation.integer"
        ]
    },
    "data": null
}
```

500:

```pythonb
{
    "status": 500,
    "message": "Internal Server Error",
    "data": null
}
```

---

### 3. (POST) api/courses

_Creates a new course with the given data_

**Post Payload**

```bash
title        | Required - String - Max Length:100
description  | String - Max Length:255
```

**Responses**

200:

```pythonb
{
    "status": 201,
    "message": "New course successfully created",
    "errors": null
}
```

400:

```pythonb
"status": 400,
    "message": "Validation Error",
    "errors": {
        "title": [
            "validation.required"
        ]
    },
    "data": null
```

500:

```pythonb
{
    "status": 500,
    "message": "Internal Server Error",
    "data": null
}
```

---

### 4. (PUT) api/courses/{course_id}

_Updates an existed course with the given data_

**Parameters**

```bash
course_id | Required - Integer
```

**Put Payload**

```bash
title        | String - Max Length:100
description  | String - Max Length:255
```

**Responses**

200:

```pythonb
{
    "status": 200,
    "message": "Course with id: 9 successfully updated",
    "errors": null
}
```

400:

```pythonb
{
    "status": 400,
    "message": "Validation Error",
    "errors": {
        "title": [
            "validation.max.string"
        ]
    },
    "data": null
}
```

404:

```pythonb
{
    "status": 404,
    "message": "Course with id 2 does not exist",
    "data": null
}
```

500:

```pythonb
{
    "status": 500,
    "message": "Internal Server Error",
    "data": null
}
```

---

### 5. (DELETE) api/courses/{course_id}

_Deletes an existed course_

**Parameters**

```bash
course_id | Required - Integer
```

**Responses**

200:

```pythonb
{
    "status": 200,
    "message": "Successful",
    "errors": null,
    "data": "Course with id: 22 successfully deleted"
}
```

400:

```pythonb
{
    "status": 400,
    "message": "Validation Error",
    "errors": {
        "id": [
            "validation.integer"
        ]
    },
    "data": null
}
```

404:

```pythonb
{
    "status": 404,
    "message": "Course with id 22 does not exist",
    "data": null
}
```

500:

```pythonb
{
    "status": 500,
    "message": "Internal Server Error",
    "data": null
}
```

---

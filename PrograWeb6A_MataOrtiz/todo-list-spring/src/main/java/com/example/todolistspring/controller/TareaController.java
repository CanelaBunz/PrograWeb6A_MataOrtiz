package com.example.todolistspring.controller;

import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/tareas")

public class TareaController {

    @GetMapping

    public String holaMundo(){
        return "Hola Mundo";
    }

}

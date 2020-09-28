<?php

use App\Choice;
use App\Group;
use App\Question;
use App\Questionnaire;
use Illuminate\Database\Seeder;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $covidQ = Questionnaire::create([
            "name" => "Covid-19",
        ]);

        $myHealth = Questionnaire::create([
            "name" => "My Personal Health",
        ]);

        $Q1 = Question::create([
            "name" => "Please Select your approprate age group from the list",
        ]);
        $Q1->choices()->saveMany([
            new Choice(["name" => "0 - 19"]),
            new Choice(["name" => "20 - 40"]),
            new Choice(["name" => "41 - 64"]),
            new Choice(["name" => "65 and Above"]),
        ]);
        
        $Q2 = Question::create([
            "name" => "Do you have high fever ?",
        ]);
        $Q2->choices()->saveMany([
            new Choice(["name" => "Yes"]),
            new Choice(["name" => "No"])
        ]);

        $Q3 = Question::create([
            "name" => " Please check for all the pre-existing condition that applies",
            "multiple_choices" => true
        ]);
        $Q3->choices()->saveMany([
            new Choice(["name" => "Asthma"]),
            new Choice(["name" => "Diabetes"]),
            new Choice(["name" => "High Blood Pressure (Hypertension)"]),
            new Choice(["name" => "Heart diseases"]),
            new Choice(["name" => "High Cholesterol"]),
            new Choice(["name" => "Check if all applies"]),
            new Choice(["name" => "None that applies"]),
        ]);

        $Q4 = Question::create([
            "name" => "Please check all of the symptoms that applies to you",
            "multiple_choices" => true
        ]);

        $group1 = Group::create(["name" => "Body aches"]);
        $group2 = Group::create(["name" => "Cough"]);
        $group3 = Group::create(["name" => "Diarrhea"]);
        $group4 = Group::create(["name" => "Fatigue"]);
        $group5 = Group::create(["name" => "Fever"]);
        $group6 = Group::create(["name" => "Runny nose"]);
        $group7 = Group::create(["name" => "None that applies"]);

        $Q4->choices()->saveMany([
            new Choice(["group_id" => $group1->id, "name" => "Mild"]),
            new Choice(["group_id" => $group1->id, "name" => "Severe"]),
            new Choice(["group_id" => $group1->id, "name" => "Critical"]),

            new Choice(["group_id" => $group2->id, "name" => "Mild"]),
            new Choice(["group_id" => $group2->id, "name" => "Severe"]),
            new Choice(["group_id" => $group2->id, "name" => "Critical"]),

            new Choice(["group_id" => $group3->id, "name" => "Mild"]),
            new Choice(["group_id" => $group3->id, "name" => "Severe"]),
            new Choice(["group_id" => $group3->id, "name" => "Critical"]),

            new Choice(["group_id" => $group4->id, "name" => "Mild"]),
            new Choice(["group_id" => $group4->id, "name" => "Severe"]),
            new Choice(["group_id" => $group4->id, "name" => "Critical"]),

            new Choice(["group_id" => $group5->id, "name" => "Mild"]),
            new Choice(["group_id" => $group5->id, "name" => "Severe"]),
            new Choice(["group_id" => $group5->id, "name" => "Critical"]),

            new Choice(["group_id" => $group6->id, "name" => "Mild"]),
            new Choice(["group_id" => $group6->id, "name" => "Severe"]),
            new Choice(["group_id" => $group6->id, "name" => "Critical"]),

            new Choice(["group_id" => $group7->id, "name" => "Mild"]),
            new Choice(["group_id" => $group7->id, "name" => "Severe"]),
            new Choice(["group_id" => $group7->id, "name" => "Critical"]),
        ]);

        $Q5 = Question::create([
            "name" => "Are you diagnosed with or experience any of the following conditions?",
            "multiple_choices" => true
        ]);
        $Q5->choices()->saveMany([
            new Choice(["name" => "Pneumonia"]),
            new Choice(["name" => "Difficult breathing "]),
        ]);

        $Q6 = Question::create([
            "name" => "Please check the professionals that applies to you",
            "multiple_choices_per_group" => true,
        ]);
        $group1= Group::create(["name" => "Essential Job"]);
        $group2 = Group::create(["name" => "Non-Essential job"]);
        $Q6->choices()->saveMany([
            new Choice(["group_id" => $group1->id, "name" => "First Responders"]),
            new Choice(["group_id" => $group1->id, "name" => "Public transporter"]),
            new Choice(["group_id" => $group1->id, "name" => "Store clerk"]),
            new Choice(["group_id" => $group1->id, "name" => "Server"]),
            new Choice(["group_id" => $group1->id, "name" => "Farmer"]),
            new Choice(["group_id" => $group1->id, "name" => "Heath care worker"]),
            new Choice(["group_id" => $group1->id, "name" => "Educators"]),
            new Choice(["group_id" => $group1->id, "name" => "Others"]),
            new Choice(["group_id" => $group2->id, "name" => "Non-Essential job"]),
        ]);

        $Q7 = Question::create([
            "name" => "Have you been in contact with an infected person in the last fourteen days?",
        ]);
        $Q7->choices()->savemany([
            new Choice(["name" => "Yes"]),
            new Choice(["name" => "No"])
        ]);

        $Q8 = Question::create([
            "name" => "Have you been in a COVID-19 hot bed within the last fourteen days?"
        ]);
        $Q8->choices()->saveMany([
            new Choice(["name" => "Yes"]),
            new Choice(["name" => "No"])
        ]);

        $Q9 = Question::create([
            "name" => "Do you have Immune deficient condition?"
        ]);
        $Q9->choices()->saveMany([
            new Choice(["name" => "Yes"]),
            new Choice(["name" => "No"])
        ]);
        $covidQ->questions()->attach([$Q1->id,$Q2->id,$Q3->id,$Q4->id,$Q5->id,$Q6->id,$Q7->id,$Q8->id,$Q9->id]);
    }
}

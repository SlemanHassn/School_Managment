<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('classrooms', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Sections', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Sections', function(Blueprint $table) {
			$table->foreign('Class_id')->references('id')->on('classrooms')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->foreign('Nationality_Father_id')->references('id')->on('nationalities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->foreign('Blood_Type_Father_id')->references('id')->on('type_bloods')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->foreign('Religion_Father_id')->references('id')->on('religions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->foreign('Blood_Type_Mother_id')->references('id')->on('type_bloods')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->foreign('Nationality_Mother_id')->references('id')->on('nationalities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->foreign('Religion_Mother_id')->references('id')->on('religions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		
	}

	public function down()
	{
		Schema::table('classrooms', function(Blueprint $table) {
			$table->dropForeign('classrooms_Grade_id_foreign');
		});
		Schema::table('Sections', function(Blueprint $table) {
			$table->dropForeign('Sections_Grade_id_foreign');
		});
		Schema::table('Sections', function(Blueprint $table) {
			$table->dropForeign('Sections_Class_id_foreign');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->dropForeign('MyParents_Nationality_Father_id_foreign');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->dropForeign('MyParents_Blood_Type_Father_id_foreign');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->dropForeign('MyParents_Religion_Father_id_foreign');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->dropForeign('MyParents_Blood_Type_Mother_id_foreign');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->dropForeign('MyParents_Nationality_Mother_id_foreign');
		});
		Schema::table('MyParents', function(Blueprint $table) {
			$table->dropForeign('MyParents_Religion_Mother_id_foreign');
		});

	}
}

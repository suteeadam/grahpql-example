<?php 
namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class SubjectType extends GraphQLType {

	protected $attributes = [
		'name' => 'Subject',
		'description' => 'A subject'
	];
  

	public function fields()
	{
		return [
			'id' => [
				'type' => Type::nonNull(Type::Int()),
				'description' => 'The id of the user'
			],
			'name' => [
				'type' => Type::string(),
				'description' => 'The name of subject'
			],
			'code' => [
				'type' => Type::string(),
				'description' => 'The code of subject'
			],
			'detail' => [
				'type' => Type::string(),
				'description' => 'The detail of subject'
			]
 		];
	}

}